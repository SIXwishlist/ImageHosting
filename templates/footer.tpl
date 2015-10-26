    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="templates/js/bootstrap.min.js"></script>
    <script>
    $("#ImageUpload").on("change", function() {
      $("#ImageUploadName").attr( "value", $(this).val());
    });
    </script>
  </body>
</html>
