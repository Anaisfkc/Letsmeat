<?php

function similarity($profil_1, $profil_2) {
    $len1 = strlen($profil_1);
    $len2 = strlen($profil_2);
    
    $max = max($len1, $len2);
    $similarity = $i = $j = 0;
    
    while (($i < $len1) && isset($str2[$j])) {
        if ($str1[$i] == $str2[$j]) {
            $similarity++;
            $i++;
            $j++;
        } elseif ($len1 < $len2) {
            $len1++;
            $j++;
        } elseif ($len1 > $len2) {
            $i++;
            $len1--;
        } else {
            $i++;
            $j++;
        }
    }

    return round($similarity / $max, 2);
}

$str1 = '12345678901234567890';
$str2 = '12345678991234567890';

echo 'Similarity: ' . (similarity($str1, $str2) * 100) . '%';
?>

