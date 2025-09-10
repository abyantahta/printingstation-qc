<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Auto Print</title>
<style>
  html, body { margin: 0; height: 100%; }
  embed { width: 100%; height: 100%; }
</style>
</head>
<body>
  <embed src="{{ $pdfUrl }}" type="application/pdf" />
  <script>
    // Wait a moment to ensure the PDF is loaded before printing
    window.onload = function() {
      setTimeout(function(){
        window.print();
        window.close();
      }, 1000); // 1 second delay
    };
  </script>
</body>
</html>
