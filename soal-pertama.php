<?php
    /*
        Array1 berisi ‘Satu’, ‘Dua’, ‘Tiga’,’Lima’
        Array2 berisi ‘Tiga’,‘Empat’,’Lima’,’Enam’

        Dari kedua array tersebut lalu dibuat irisannya dan dimasukkan ke Array baru sehingga Array baru hanya berisi data irisannya.
        Setelah itu tampilkan isi array baru itu sesuai urutan abjad.
    */

    $array1 = ['Satu','Dua','Tiga','Lima'];
    $array2 = ['Tiga','Empat','Lima','Enam'];

    $sliceFromArray = array_intersect($array1, $array2);
    $sortArray = sort($sliceFromArray);

    print_r($sliceFromArray);

    /*
        Object1 berisi ‘Satu’, ‘Dua’, ‘Tiga’,’Lima’
        Object2 berisi ‘Tiga’,‘Empat’,’Lima’,’Enam’

        Dari kedua object tersebut lalu dibuat irisannya dan dimasukkan ke Object baru sehingga Object baru hanya berisi data irisannya.
        Setelah itu tampilkan isi object baru itu sesuai urutan abjad.
    */
    $object1 = (object) ['Satu','Dua','Tiga','Lima'];
    $object2 = (object) ['Tiga','Empat','Lima','Enam'];

    $sliceFromObject = [];

    foreach ($object1 as $obj1) {
        foreach ($object2 as $obj2) {
            if($obj1 == $obj2) {
                $sliceFromObject[] = $obj2;
            }
        }
    }
    
    $sortArray = sort($sliceFromObject);
    $result = (object) $sliceFromObject;

    dd($result);
?>