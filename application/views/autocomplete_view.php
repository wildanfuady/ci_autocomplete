<html>
<head>
  <title>Autocomplete Menggunakan Typeahead Js dan Codeigniter</title>
  <!-- CSS Script -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
  <style>
    .box
    {
      width:100%;
      max-width: 650px;
      margin:0 auto;
    }
    .container{
      margin-top: 50px;
    }
    #prefetch{
      margin-top: 50px;
    }
  </style>

</head>
<body>
  
  <div class="container">
    <h3 class="text-center">Autocomplete Menggunakan Typeahead Js dan Codeigniter</h3>
    <div id="prefetch">
      <input type="text" name="search_box" id="search_box" class="form-control input-lg typeahead" placeholder="Cari siswa" />
    </div>
  </div>

  <!-- Jquery, Bootstrap dan Typehead -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

  <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
  <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

  <!-- Page Script -->
  <script>
  $(document).ready(function(){

    var sample_data = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch:'<?php echo base_url(); ?>autocomplete/fetch',
      remote:{
        url:'<?php echo base_url(); ?>autocomplete/fetch/%QUERY',
        wildcard:'%QUERY'
      }
    });
    
    $('#prefetch .typeahead').typeahead(null, {
      nama: 'sample_data',
      display: 'nama',
      source:sample_data,
      limit:10,
      templates:{
        suggestion:Handlebars.compile('<div class="row"><div class="col-md-12">{{nama}}</div></div>')
      }
    });

  });
  </script>
</body>
</html>