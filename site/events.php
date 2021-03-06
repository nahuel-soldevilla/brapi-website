<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<?php
    include("html/header.html");
?>
    <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
        <main>
            <div class="page-loader">
                <div class="loader">Loading...</div>
            </div>
            <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <?php
                    include("html/menu.html");
                ?>
            </nav>
            <?php
                $PageTitle = "Events";
                include("html/page-title-section.php");
            ?>
            <div class="main">
                <?php
                    include("html/events-section.html");
                    include("html/footer.html");
                ?>
            </div>
            <div class="scroll-up"><a href="#totop"><i class="mdi mdi-chevron-up"></i></a></div>
        </main>
        <script>
            $( document ).ready(function() {
                $.getJSON("json/events.json?nocache=" + Date.now(), function(event){
                    
                    var event_template = $('#event-template').html();
                    Mustache.parse(event_template); // optional, speeds up future uses

                    var past_event_template = $('#past-event-template').html();
                    Mustache.parse(past_event_template); // optional, speeds up future uses

                    $(event).each(function(i, e){
                        if($(e)[0]['upcoming']){
                            var rendered = Mustache.render(event_template, e);
                            $('#event-list').append(rendered);
                        }else{
                            var rendered = Mustache.render(past_event_template, e);
                            $('#past-event-list').append(rendered);
                        }
                    });
                });
            });
        </script>
    </body>
</html>