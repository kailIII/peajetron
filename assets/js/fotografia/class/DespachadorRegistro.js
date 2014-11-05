function DespachadorRegistro()
{
  this.confs = new Configuration("http://localhost/peajetron/index.php/fotografia/registrarPaso", "POST");
}

DespachadorRegistro.prototype.sendRequest = function(processedText)
{
  var nd = new Date();
  var month = nd.getMonth() + 1;
  var time = nd.getDate() + "-" + month + "-" + nd.getFullYear() + " " + nd.getHours() + ":" + nd.getMinutes() + ":" + nd.getSeconds();
  var cabine = $('#identificador_cabina').val();
  //var sha1Text = processedText + "" + time + "" + cabine;
  var sha1Text = processedText + ""  + cabine;
  alert(sha1Text);
  //var hash = CryptoJS.SHA1("Message");
  if(this.confs.method == "POST")
  {
    //DO POST
    $.post(this.confs.url, { text: 'AAA111',cabine:cabine},function( data ) {
//       alert(data.status+": "+data.message);
      $("#message").empty();
      $("#message").html(data.message);
    },"json");
  }
  if(this.confs.method == "GET")
  {
    //DO GET
    $.get(this.confs.url,{ text: processedText, time: time, cabine:cabine, sha1: hash },function( data ) {
      alert(data.status+": "+data.message);
    },"json");
  }
}
