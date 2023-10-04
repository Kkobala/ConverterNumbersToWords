<?php

function converter($number){
    $numArray = [
        1=> 'ერთი',
        2=> 'ორი',
        3=> 'სამი',
        4=> 'ოთხი',
        5=> 'ხუთი',
        6=> 'ექვსი',
        7=> 'შვიდი',
        8=> 'რვა',
        9=> 'ცხრა',
        10=> 'ათი',
        11=> 'თერთტმეტი',
        12=> 'თორმეტი',
        13=> 'ცამეტი',
        14=> 'თოთხმეტი',
        15=> 'თხუთმეტი',
        16=> 'თექვსმეტი',
        17=> 'ჩვიდმეტი',
        18=> 'თვრამეტი',
        19=> 'ცხრამეტი',
        20=> 'ოცი',
        40=> 'ორმოცი',
        60=> 'სამოცი',
        80=> 'ოთხმოცი',
        100=> 'ასი',
        1000000=> 'მილიონი',
        1000000000=> 'მილიარდი',
    ];

    $finalresult = " ";

    if(isset($numArray[$number])){
        $finalResult = $numArray[$number];
    }
    else
    {
        if($number > 20 && $number < 100)
        {
           $finalResult = mb_substr(converter($number-$number%20), 0, mb_strlen(converter($number-$number%20)) - 1)."და".converter($number % 20);
        }
        elseif($number>=100 && $number<1000)
        {
            $prefix=" ";

            if(floor($number/100)>1)
            {
                if(mb_substr(converter(floor($number/100)), mb_strlen(converter(floor($number/100))) - 1, mb_strlen(converter(floor($number/100)))) == 'ი')
                {
                    $prefix=mb_substr(converter(floor($number/100)), 0, -1);
                }
                else
                {
                 $prefix=converter(floor($number/100));
                }
            }

            if($number%100==0){
                $finalResult = $prefix.converter(100);
            }else{
                $finalResult = $prefix.mb_substr(converter(100), 0, -1).converter($number%100);
            }  
        }

        else if($number >= 1000 && $number < 1000000)
            {
                if($number/1000 == 1)
                {
                    $finalResult = mb_substr(converter($number/100), 0, -1).converter($number/10);
                }
                else
                {
                    if($number%1000 == 0)
                    {
                        $finalResult = converter($number/1000).converter(1000);
                    }
                    else
                    {
                        if(floor($number/1000) > 1)
                        {
                            $finalResult = converter($number/1000).mb_substr(converter(1000), 0 , -1).' '.converter($number%1000);
                        }
                        else
                        {
                            $finalResult = mb_substr(converter(1000), 0 , -1).' '.converter($number%1000);
                        }
                    }
                }
            }

            else if($number > 1000000 && $number < 1000000000)
            {
                $prefix=" ";

                if(floor($number/1000000)>1)
                {
                    $prefix=converter(floor($number/1000000));
                }

                if($number%1000000==0){
                    $finalResult = $prefix.converter(1000000);
                }else{
                    $finalResult = $prefix.mb_substr(converter(1000000), 0, -1).''.converter($number%1000000);
                }
            }

            else if($number > 1000000000 && $number < 1000000000000)
            {
                $prefix=" ";

                if(floor($number/1000000000)>1)
                {
                    $prefix=converter(floor($number/1000000000));
                }

                if($number%1000000000==0){
                    $finalResult = $prefix.converter(1000000000);
                }else{
                    $finalResult = $prefix.mb_substr(converter(1000000000), 0, -1).' '.converter($number%1000000000);
                }
            }
    }

    return $finalResult;
}

echo converter(21123900000);
?>

<style>
    *{
        background: black;
        color: White;
    }
    </style>