/**
 * @typedef FilterViewController
 * @type Class
 * @property {HTMLElement} _root
 * @property {string} _key
 * @property {string} _plural
 * @property {ResultsController} _controller
 * @property {HTMLElement} _defaultValueElement
 * @property {HTMLElement[]} _valueElements
 */
export default class FilterViewController {
    /**
     * @param {HTMLElement} root
     * @param {ResultsController} resultsController
     */
    constructor(root, resultsController) {
        // noinspection JSUnusedGlobalSymbols
        this._root = root;
        this._key = root.getAttribute("data-key");
        this._plural = root.getAttribute("data-plural");
        this._controller = resultsController

        const values = Array.from(root.querySelectorAll("li"));
        this._defaultValueElement = values.splice(0,1)[0];
        this._valueElements = values;

        this._defaultValueElement.addEventListener('click', this._resetFilter.bind(this))
        this._valueElements.forEach(el => el.addEventListener('click', this._toggleFilter.bind(this)))
    }

    updateCounts() {
        const counts = this._controller.getFilterCounts(this._key);
        this._valueElements.forEach(el => {
            const spans = el.querySelectorAll("span");
            const key = spans[1].firstChild.wholeText;
            spans[2].innerText = `(${counts[key] || 0})`
        })
    }

    /**
     * Handles a click on a non-default element
     * @param {MouseEvent} event
     * @private
     */
    _toggleFilter(event) {
        /** @type {HTMLLIElement} */
        const liElem = event.currentTarget;
        const value = liElem.querySelectorAll('span')[1].innerText;
        const query = this._controller.getQuery();
        if(query.filterContainsValue(this._key, value)) {
            query.removeFromFilter(this._key, value);
            this.setVisualActiveState(liElem, false);
            if(query[this._key].length === 0) {
                this.setVisualActiveState(this._defaultValueElement, true);
            }
        } else {
            query.addToFilter(this._key, value);
            this.setVisualActiveState(liElem, true);
            this.setVisualActiveState(this._defaultValueElement, false);
        }
        this.setTopLevelState();
        this._controller.replaceQuery(query);
    }

    /**
     * Handles a click on the default element
     * @param {MouseEvent} event
     * @private
     */
    _resetFilter(event) {
        const query = this._controller.getQuery();
        query.resetFilter(this._key)
        const that = this;
        this._valueElements.forEach(el => that.setVisualActiveState(el, false));
        this.setVisualActiveState(this._defaultValueElement, true);
        this.setTopLevelState();
        this._controller.replaceQuery(query);
    }

    setTopLevelState(){
        const query = this._controller.getQuery();
        const count = query[this._key].length;
        const element = this._root.firstElementChild.firstElementChild;
        if(count === 0) {
            element.innerText = `All ${this._plural}`;
        } else if (count === 1) {
            element.innerText = query[this._key][0];
        } else {
            element.innerText = `Multiple ${this._plural}`;
        }
    }
    /**
     * Sets the visual state of the component to checked or unchecked depending on parameter
     * @param {HTMLLIElement} element
     * @param {boolean} checked
     */
    setVisualActiveState(element, checked) {
        const aElem = element.firstElementChild;
        this._setClassActive(aElem, "text-blue-800", checked);
        this._setClassActive(aElem, "font-semibold", checked);
        this._setClassActive(aElem, "text-gray-700", !checked);

        const checkSpanElem = aElem.firstElementChild;
        this._setClassActive(checkSpanElem, "invisible", !checked);
    }
    /**
     * Add or remove a class from element based on whether or not isActive is true
     * @param {ChildNode} element
     * @param {string} targetClass
     * @param {boolean} isActive
     * @private
     */
    _setClassActive(element, targetClass, isActive) {
        if(isActive) {
            element.classList.add(targetClass);
        } else {
            element.classList.remove(targetClass);
        }
    }
}