  <head>
    <meta charset="utf-8">
    <title>Tutorial #1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div id="dka">
      {{ message }}
      <label for="" title="getDate">Проверка времени</label>
    </div>
  </body>
 <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript">
var app = new Vue({
  el: '#dka',
  data: {
    message: 'Hello Vue!',
    getDate: 'Текущее время: ' + new Date().toLocaleString()
  }
})
</script>
