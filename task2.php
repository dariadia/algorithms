<?php
  // пару раз вынесла браузеру мозг :) После всех тестов foreach в несколько (х3, х4) раз быстрее на массивах + потестила разные foreach против друг друга

  /* foreach 24.988348960876
    foreach (using reference) 76.899970054626
    foreach (hash table) 0.18567299842834 */

  $test_iterations = 100;
  $test_arr_size = 1000;
 
  // вроде проверки, чтобы ничего не мешало тесту
  function test($input)
  {
    echo '<!-- '.trim($input).' -->';
  }

  // обычный array
  $test_arr1 = array();
  $test_arr2 = array();
  $test_arr3 = array();
  // hash tables
  $test_arr4 = array();
  $test_arr5 = array();
 
  for ($i = 0; $i < $test_arr_size; ++$i)
  {
    mt_srand();
    $hash = md5(mt_rand());
    $key = substr($hash, 0, 5).$i;
   
    $test_arr1[$i] = $test_arr2[$i] = $test_arr3[$i] = $test_arr4[$key] = $test_arr5[$key]
      = $hash;
  }
 
  // foreach
 
  $start = microtime(true);
  for ($j = 0; $j < $test_iterations; ++$j)
  {
    foreach ($test_arr1 as $k => $v)
    {
      test($v);
    }
  }
  echo '<strong>foreach</strong> '.(microtime(true) - $start).'<br / >';  
 
// foreach (using reference)
 
  $start = microtime(true);
  for ($j = 0; $j < $test_iterations; ++$j)
  {
    foreach ($test_arr2 as &$value)
    {
      test($value);
    }
  }
  echo '<strong>foreach</strong> (using reference) '.(microtime(true) - $start).'<br / >';

   
 // foreach (hash table)
 
  $start = microtime(true);
  for ($j = 0; $j < $test_iterations; ++$j)
  {
    foreach ($test_arr4 as $k => $v)
    {
      test($v);
    }
  }
  echo '<strong>foreach</strong> (hash table) '.(microtime(true) - $start).'<br / >';
 
 
 // для многомерных тоже посмотрела. Код с итератором смотрится аккуратнее

 $multiArr = [
    ["red", "blue"],
    ["aussie", "koala"],
    ["magpie", "cloudspring"],
    "not an array"
];

foreach ($multiArr as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $k => $v) {
            echo $k . ": " . $v . "<br />";
        }
    }
    else {
        echo $key . ": " . $value . "<br />";
    }
}
// VS

$iter = new RecursiveArrayIterator($multiArr);
foreach(new RecursiveIteratorIterator($iter) as $key => $value) {
    echo $key . ": " . $value . "<br />";
}





