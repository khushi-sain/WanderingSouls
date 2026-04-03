<?php
$hotels = [
["id"=>1,"name"=>"Hotel Snowcrests Manor","price"=>4500,"rating"=>8.2,"location"=>"Beyond log Huts, Old Manali","facility"=>"free wi-fi","img"=>"manaliimages/hotel1manali.png"],
["id"=>2,"name"=>"Hotel Dream Land Riverside","price"=>1019,"rating"=>5.6,"location"=>"Old Manali","facility"=>"riverside","img"=>"manaliimages/hotel2manali.png"],
["id"=>3,"name"=>"Apple Country Resort - A Vegetarian Place","price"=>3600,"rating"=>8.1,"location"=>"Log Hut Area","facility"=>"view","img"=>"manaliimages/hotel3manali.png"],
["id"=>4,"name"=>"Shingar Regency","price"=>2524,"rating"=>8.5,"location"=>"Hadimba Temple Road","facility"=>"steam & sauna","img"=>"manaliimages/hotel4manali.png"],
];

$search = $_GET['search'] ?? '';
$facility = $_GET['facility'] ?? [];
$maxPrice = $_GET['price'] ?? '';
$sort = $_GET['sort'] ?? '';
$rating = $_GET['rating'] ?? '';

$filtered = [];

foreach($hotels as $h){
if($search && stripos($h['name'],$search)===false) continue;
if($maxPrice && $h['price'] > $maxPrice) continue;
if($rating && $h['rating'] < $rating) continue;
if(!empty($facility) && !in_array($h['facility'],$facility)) continue;
$filtered[] = $h;
}

if($sort=="low"){
usort($filtered, fn($a,$b)=> $a['price'] <=> $b['price']);
}
elseif($sort=="high"){
usort($filtered, fn($a,$b)=> $b['price'] <=> $a['price']);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manali</title>

<style>
body{
margin:0;
background:#061D21;
color:white;
font-family:sans-serif;
}

/* NAVBAR */
.navbar{
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 40px;
background:#061D21;
border-bottom:1px solid rgba(255,255,255,0.1);
}

.logo img{height:45px;}

.back{
color:white;
border:1px solid #C9973A;
padding:6px 15px;
border-radius:20px;
text-decoration:none;
}
.back:hover{background:#C9973A;color:black;}

/* HERO */
.hero{
height:75vh;
background:url('manali.jpg') center/cover no-repeat;
display:flex;
justify-content:center;
align-items:center;
}
.hero h1{font-size:60px;}

/* OVERVIEW */
.overview{
padding:80px 60px;
text-align:center;
}

.overview h2{
font-size:32px;
margin-bottom:20px;
}

.overview-text{
max-width:900px;
margin:auto;
color:#ccc;
line-height:1.7;
}

.overview-points{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:20px;
margin-top:40px;
}

.point{
background:rgba(255,255,255,0.06);
padding:18px;
border-radius:12px;
}

/* LAYOUT */
.container{padding:40px;}
.layout{display:flex;gap:20px;}

/* FILTER */
.filters{
width:25%;
background:#0B2E33;
padding:20px;
border-radius:12px;
}

.filters select{
width:100%;
padding:8px;
border-radius:8px;
border:none;
background:#0f3a40;
color:white;
}

/* BUTTON */
.apply-btn{
margin-top:20px;
width:100%;
padding:12px;
border:none;
border-radius:12px;
background:linear-gradient(135deg,#C9973A,#e6c067);
color:#000;
font-weight:600;
}

/* LIST */
.list{width:75%;}

.card{
display:flex;
background:#0B2E33;
margin-bottom:20px;
border-radius:10px;
overflow:hidden;
}

.card img{
width:230px;
height:170px;
object-fit:cover;
}

.info{padding:15px;flex:1;}
.right{padding:15px;text-align:right;}

.btn{
background:#C9973A;
color:black;
padding:8px 12px;
border-radius:6px;
text-decoration:none;
}
</style>

</head>

<body>

<div class="navbar">
<div class="logo"><img src="tripzy2.png"></div>
<a href="home.php" class="back">← Back</a>
</div>

<section class="hero">
<h1>Trip to Manali</h1>
</section>

<section class="overview">
<h2>Manali Package Overview</h2>

<p class="overview-text">
Explore the scenic beauty of Manali with snow-capped mountains, adventure sports,
and peaceful valleys. A perfect getaway for nature lovers and thrill seekers.
</p>

<div class="overview-points">
<div class="point">✔ Snow mountain views</div>
<div class="point">✔ Adventure sports</div>
<div class="point">✔ Local sightseeing</div>
<div class="point">✔ Cozy stays</div>
<div class="point">✔ Perfect for couples & friends</div>
</div>
</section>

<div class="container">

<div class="layout">

<div class="filters">
<form method="GET">

<p>Budget</p>
<input type="range" name="price" min="0" max="6000">
<p>₹ 0 - ₹ <?php echo $maxPrice ?: 6000; ?></p>

<p>Rating</p>
<select name="rating">
<option value="">All</option>
<option value="7">7+</option>
<option value="8">8+</option>
</select>

<p>Sort</p>
<select name="sort">
<option value="">Default</option>
<option value="low">Low → High</option>
<option value="high">High → Low</option>
</select>

<button class="apply-btn">Apply Filters</button>

</form>
</div>

<div class="list">

<?php
foreach($filtered as $h){
echo "
<div class='card'>
<img src='{$h['img']}'>
<div class='info'>
<h3>{$h['name']}</h3>
<p>{$h['location']}</p>
</div>
<div class='right'>
<p>{$h['rating']}</p>
<p>₹{$h['price']}</p>
<a href='book.php?id={$h['id']}' class='btn'>Book</a>
</div>
</div>
";
}
?>

</div>

</div>

</div>

</body>
</html>