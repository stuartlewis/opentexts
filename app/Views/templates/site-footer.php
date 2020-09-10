        <footer role="footer" class="mx-auto max-w-3xl grid md:grid-cols-3 gap-12 justify-center items-center p-6 md:p-12 text-white">
            <section class="md:col-span-2">
                <div class="flex mb-4">
                    <a href="/"><img src="/images/logo.svg" class="" alt="Open Texts website logo" /></a>
                
                    <img src="/images/logotype.svg" class="" alt="Open Texts: Opening up a world of digitised texts" />
                </div>

                <p class="text-lg">OpenTexts.World is an experimental service developed to provide free access to digitised text collections from around the world.</p>
            </section>

            <section>
                <ul>
                <li>Home</li>
                <li>About</li>
                <li>Get Involved</li>
                <li>Help</li>
            </section>
            
            <section class="md:col-span-3 opacity-75 text-xs text-center">
                &copy; <?php echo date('Y'); ?> OpenTexts.world.
                &middot; 
                <a href="#">Accessibility</a>
                &middot;
                <a href="#">Privacy</a>
        </footer>

        <script type="text/javascript">
            window.doorbellOptions = {
                "id": "11688",
                "appKey": "h4ZLt1kpIj6ch9JeeV48pgpl653MdPYKmpnOEZqDxqM3sZ6vgTuDmJAufJY8R8uG"
            };
            (function(w, d, t) {
                var hasLoaded = false;
                function l() { if (hasLoaded) { return; } hasLoaded = true; window.doorbellOptions.windowLoaded = true; var g = d.createElement(t);g.id = 'doorbellScript';g.type = 'text/javascript';g.async = true;g.src = 'https://embed.doorbell.io/button/'+window.doorbellOptions['id']+'?t='+(new Date().getTime());(d.getElementsByTagName('head')[0]||d.getElementsByTagName('body')[0]).appendChild(g); }
                if (w.attachEvent) { w.attachEvent('onload', l); } else if (w.addEventListener) { w.addEventListener('load', l, false); } else { l(); }
                if (d.readyState == 'complete') { l(); }
            }(window, document, 'script'));
        </script>

    </body>
</html>
