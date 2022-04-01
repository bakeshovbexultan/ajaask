<?php

$xmlDoc = new DOMDocument();
$xmlDoc->load("catalog_ilab.xml");

$store = $xmlDoc->getElementsByTagName('store');
$cities = [];

for ($i = 0; $i < $store->length; $i++) {
  $cities[] = $store[$i]->getAttribute('postcode');
}

$cities = array_unique($cities);
sort($cities);

$offer = $xmlDoc->getElementsByTagName('offer');

$i = 0;

foreach ($cities as $city) {
  echo $city;
  echo "<br>";

  for ($i = 0; $i < $offer->length; $i++) {
    if ($city == $store[$i]->getAttribute('postcode')) {
      echo $offer[$i]->getAttribute('id') . ', ';
      echo $offer[$i]->getElementsByTagName('name')[0]->childNodes[0]->nodeValue . ', ';
      echo $offer[$i]->getElementsByTagName('vendor')[0]->childNodes[0]->nodeValue . ', ';
      echo $offer[$i]->getElementsByTagName('price')[0]->childNodes[0]->nodeValue;
      echo "<br>";
    }
  }

  echo "<br>";
  $i++;
}