    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    function ShowMessage(ID) {
        $("#Message-"+ID).toggle("slow");
    }
    function ShowOptions(ID) {
        $("#DELETE-"+ID).show();
    }
    function HideOptions(ID) {
        $("#DELETE-"+ID).hide();
    }
    </script>
  </body>
</html>
