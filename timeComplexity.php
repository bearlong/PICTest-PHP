<?php
// 1. 下列程式會找出 2 個陣列重覆的資料，請改寫以下程式，讓時間複雜度 < O(n²)。(25%)
// foreach ($data_a as $val_a) {
//     foreach ($data_b as $val_b) {
//         if ($val_a == $val_b) {
//          echo $val_a . "\n";
//         }
//     }
// }

$data_a  = [1, 2, 3, 4, 5];
$data_b = [4, 5, 6, 7, 8];

$set_b = array_flip($data_b); // 時間複雜度 O(n) 

foreach ($data_a as $val_a) {  //  時間複雜度 O(n)
    if (isset($set_b[$val_a])) {
        echo $val_a . "\n";  // 如果元素存在 $data_b 中則印出  時間複雜度 O(1)
    }
}

// 總時間複雜度：O(n)

// 回應為:   4  5