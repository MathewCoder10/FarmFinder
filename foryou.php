<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>full screen landing page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="stylees.css">
    <style>
html,body{
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
}
.b1{
  width: 100%;
  height: 100%;
  margin: auto;
  background: #232323;
  top: 0;
  display: table;
  background-size: cover;
}
.b1 .in1{
  display: table-cell;
  vertical-align: middle;
  width: 100%;
  max-width: none;
}
.content{
  max-width: 500px;
  margin: auto;
  text-align: center;
}
.content h1{
  font-family: 'Century Gothic',sans-serif;
  color: #f9f3f4;
  font-size: 300%;
  text-shadow: 0 0 300px #000;
}
.content .btn{
  border-radius: 9px;
  color: #f9f3f4;
  text-decoration: none;
  font-family: 'Century Gothic',sans-serif;
  border: 3px solid;
  padding: 7px 13px;
  font-weight: bold;
}
.content .btn:hover{
  color: green;
}
    </style>
  </head>
  <body>
<section class="b1">
  <div class="in1">
    <div class="content">
      <h1 class="typewriter">
FOR YOU SECTION IS TO 
<BR>IDENTIFY THE SUITABLE FARM FOR YOU</h1>
<br>

<a class="btn" href="filter.php">GET STARTED</a>
    </div>
</div>
</section>

</body>
</html>