<!DOCTYPE html>
<html>
<head>
        <title>Group 7</title>
    </head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: block;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 15px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  background-color: #9B59B6;
  color: #ffffff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #512E5F;
}

.aside {
  background-color: #BB8FCE;
  padding: 15px;
  color: #ffffff;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
  background-color: #4A235A;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 15px;
}

/* For desktop: */
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}
</style>
<body>

<div class="header">
  <h1>GROUP 7 - MEMBERS</h1>
</div>

<div class="row">
  <div class="col-3 menu">
    <ul>
    <a href="index.php"target="_blank"> <li>HOME</li></a>
    <a href="categories.php"target="_blank"> <li>CATEGORIES</li></a>
    <a href="shoes.php" target="_blank"> <li>SHOES LIST</li></a>
    </ul>
  </div>

  <div class="col-6">
    <h2>Meet the members!</h2>
     <table>
     <tr>
       <th
        rowspan=1>  <img src="amaleen.png" width="140"></th>
       <td align="center">Nur Amaleen Aishah Binti Salehuddin<br>
           2019211444 | CS110 4C</td></tr><br>
       <tr>
           <th
        rowspan=1>  <img src="fatin.png" width="140"></th>
       <td align="center">Fatin Nur Afiqah Binti Zaheran<br>
           2019200428 | CS110 4C</td></tr><br>
       <tr>
           <th
        rowspan=1>  <img src="iman.png" width="140"></th>
       <td align="center">Iman Binti Suhaili<br>
           2019686886 | CS110 4C</td></tr><br>
       <tr>
           <th
        rowspan=1>  <img src="syaz.png" width="140"></th>
       <td align="center"> Norsyarizan Syaznee Binti Muhd Shukri<br>
           2019216222 | CS110 4C</td></tr><br>
</table><br><br>
  </div>

  <div class="col-3 right">
    <div class="aside">
      <h2>LootShoe </h2>
        <img src="lootshoe.png" width = "300">
        <h4>Make every step a magical step with LootShoe</h4>
      <p>Lootshoe is a brand-new developed website for online shoes ordering system. From this website, there are different kinds shoes categories that is perfect and suitable for all ages.</p>
    </div>
  </div>
</div>

<div class="footer">
  <p>For Group Assessment only.</p>
</div>

</body>
</html>