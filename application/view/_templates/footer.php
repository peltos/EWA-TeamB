
        <!-- end of main container -->
        </div>
    </div>

    <!-- backlink to repo on GitHub, and affiliate link to Rackspace if you want to support the project -->
    <div class="footer">
    </div>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- our JavaScript -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            let URL = '<?php echo URL; ?>';
        </script>
        <script>
            function menuAnimation(x) {
                let header = document.getElementById("header")
                header.classList.toggle("active");
            }
        </script>
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="<?php echo URL; ?>js/streamers.js"></script>
    <script src="<?php echo URL; ?>js/nightmode.js"></script>
</body>
</html>
