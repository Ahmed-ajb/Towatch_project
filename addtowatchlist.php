<script>
$(".addtowatchlistform").submit(function(e) {
  var data = $(this).serialize();
  var url = $(this).attr("action");
  $.post(url, data, function() {
     try {
        data = JSON.parse(data);
        $("button#addtowatchlistbutton").data('tooltip', data.addremove + " TO YOUR WATCHLIST");
        $("button#addtowatchlistbutton").css('color',data.watchlisticoncolor);
    } catch (e) {
        console.log("json encoding failed");
        return false;
    }
  });
  return false;
});
</script>
<?php
$response = new \stdClass();
$response->addremove = "item1";//you can get the data anyway you want(e.g database)
$response->watchlisticoncolor = "red";
die(json_encode($response));
?>