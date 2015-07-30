<head>
  <meta charset="utf-8">
  <title>Executive Care Homes</title>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300|Raleway:300,400' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/website/static/css/style.css" media="screen" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
            // Wait until the DOM has loaded before querying the document
            $(document).ready(function(){
                $('ul.tabs').each(function(){
                    // For each set of tabs, we want to keep track of
                    // which tab is active and it's associated content
                    var $active, $content, $links = $(this).find('a');

                    // If the location.hash matches one of the links, use that as the active tab.
                    // If no match is found, use the first link as the initial active tab.
                    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    $active.addClass('active');

                    $content = $($active[0].hash);

                    // Hide the remaining content
                    $links.not($active).each(function () {
                        $(this.hash).hide();
                    });

                    // Bind the click event handler
                    $(this).on('click', 'a', function(e){
                        // Make the old tab inactive.
                        $active.removeClass('active');
                        $content.hide();

                        // Update the variables with the new link and content
                        $active = $(this);
                        $content = $(this.hash);

                        // Make the tab active.
                        $active.addClass('active');
                        $content.show();

                        // Prevent the anchor's default click action
                        e.preventDefault();
                    });
                });
            });
        </script>
</head>
