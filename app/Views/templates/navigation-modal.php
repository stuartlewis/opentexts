<nav role="navigation" id="navigation-modal-wrapper" class="fixed top-0 right-0 bottom-0 z-10 bg-gray-200 p-4 w-full max-w-sm modal-closed">
    <a tabindex="0" id="navigation-close" class="w-10 flex ml-auto flex-col justify-center items-center text-gray-700 no-underline cursor-pointer hover:text-blue-700">
        <span aria-hidden="true" class="text-opacity-50"><?php echo file_get_contents('svg/x.svg'); ?></span>
        <span class="sr-only">Close</span>
    </a>
  <ul class="navigation-modal ml-2">
    <?php
        $current_path = getCurrentPage();
        renderNavLink("/", "Home", $current_path);
        renderNavLink("/about", "About", $current_path);
        renderNavLink("/contribute", "Contribute", $current_path);
        renderNavLink("/help", "Help", $current_path);
        ?>
  </ul>
</nav>
<?php
if(!isset($data['payload'])) {
    ?>
    <script src="./scripts/static-page.js" type="module"></script>
    <script src="/scripts/navigation-modal.js"></script>
<?php
}
