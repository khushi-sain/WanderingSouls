<?php
$hotels = [
["id"=>1,"name"=>"Sea Breeze Resort","price"=>2500,"rating"=>7.4,"location"=>"Candolim","facility"=>"breakfast","img"=>"hotel1goa.png"],
["id"=>2,"name"=>"Paradise Village Beach Resort","price"=>3200,"rating"=>8.3,"location"=>"Baga","facility"=>"beach","img"=>"hotel2goa.png"],
["id"=>3,"name"=>"Sunset Villa","price"=>2000,"rating"=>6.1,"location"=>"Anjuna","facility"=>"pool","img"=>"hotel3goa.webp"],
["id"=>4,"name"=>"Calangute Residency","price"=>4111,"rating"=>8.0,"location"=>"Calangute","facility"=>"breakfast","img"=>"hotel4goa.png"],
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
<title>Goa</title>

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
transition:0.3s;
}
.back:hover{background:#C9973A;color:black;}

/* HERO */
.hero{
height:75vh;
background:url('goa.jpg') center/cover no-repeat;
display:flex;
justify-content:center;
align-items:center;
}
.hero h1{font-size:60px;}

/* 🔥 OVERVIEW FIXED */
.overview{
padding:80px 60px;
text-align:center;
}

.overview h2{
font-size:32px;
margin-bottom:20px;
letter-spacing:1px;
}

.overview-text{
max-width:900px;
margin:auto;
color:#ccc;
font-size:17px;
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
font-size:15px;
transition:0.3s;
}
.point:hover{
transform:translateY(-5px);
background:rgba(255,255,255,0.1);
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

.filters h3{
cursor:pointer;
margin-bottom:10px;
}

/* SELECT FIX */
.filters select{
width:100%;
padding:8px;
border-radius:8px;
border:none;
margin-top:5px;
background:#0f3a40;
color:white;
}

/* 🔥 BUTTON FIX */
.apply-btn{
margin-top:20px;
width:100%;
padding:12px;
border:none;
border-radius:12px;
background:linear-gradient(135deg,#C9973A,#e6c067);
color:#000;
font-weight:600;
font-size:15px;
cursor:pointer;
transition:all 0.3s ease;
box-shadow:0 5px 15px rgba(201,151,58,0.3);
}

.apply-btn:hover{
transform:translateY(-2px);
box-shadow:0 8px 20px rgba(201,151,58,0.5);
}

/* LIST */
.list{width:75%;}

/* CARD */
.card{
display:flex;
background:#0B2E33;
margin-bottom:20px;
border-radius:10px;
overflow:hidden;
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
box-shadow:0 10px 20px rgba(0,0,0,0.4);
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
display:inline-block;
margin-top:10px;
}
</style>

</head>

<body>

<!-- NAV -->
<div class="navbar">
<div class="logo">
<img src="tripzy2.png">
</div>
<a href="home.php" class="back">← Back</a>
</div>

<!-- HERO -->
<section class="hero">
<h1>Trip to Goa</h1>
</section>

<!-- OVERVIEW -->
<section class="overview">
<h2>Goa Package Overview</h2>

<p class="overview-text">
Experience the vibrant charm of Goa with this specially curated travel package. 
From relaxing beaches to thrilling nightlife and water sports, this trip offers 
the perfect mix of adventure and relaxation.
</p>

<div class="overview-points">
<div class="point">✔ Beachside stay with scenic views</div>
<div class="point">✔ Exciting water sports activities</div>
<div class="point">✔ Local sightseeing & market visits</div>
<div class="point">✔ Comfortable hotel with modern amenities</div>
<div class="point">✔ Perfect for couples, friends & family</div>
</div>
</section>

<div class="container">

<div class="layout">

<!-- FILTER -->
<div class="filters">

<h3 onclick="toggleFilter()">Filters ⬇</h3>

<div id="filterContent">
<form method="GET">

<p>Budget</p>
<input type="range" name="price" min="0" max="5000" value="<?php echo $maxPrice; ?>">
<p>₹ 0 - ₹ <?php echo $maxPrice ?: 5000; ?></p>

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

<p>Facilities</p>
<label><input type="checkbox" name="facility[]" value="beach"> Beach</label>
<label><input type="checkbox" name="facility[]" value="pool"> Pool</label>
<label><input type="checkbox" name="facility[]" value="breakfast"> Breakfast</label>

<button class="apply-btn">Apply Filters</button>

</form>
</div>

</div>

<!-- LIST -->
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

<script>
function toggleFilter(){
let f = document.getElementById("filterContent");
f.style.display = (f.style.display === "none") ? "block" : "none";
}
</script>

</body>
</html>