<?php
class Sorter
{
    public function ShellSort($elements)
    {
        $k = 0;
        $length = count($elements);
        $gap[0] = (int) ($length / 2);

        while ($gap[$k] > 1) {
            $k++;
            $gap[$k] = (int) ($gap[$k - 1] / 2);
        }

        for ($i = 0; $i <= $k; $i++) {      // O(N)
            $step = $gap[$i];

            for ($j = $step; $j < $length; $j++) { // O(N), то есть имеем O(N^2)
                $temp = $elements[$j];
                $p = $j - $step;

                while ($p >= 0 && $temp['price'] < $elements[$p]['price']) {
                    $elements[$p + $step] = $elements[$p];
                    $p = $p - $step;
                }

                $elements[$p + $step] = $temp;
                //echo $step . PHP_EOL;
            }
        }

        return $elements;
    }

    public function mergeSort($elements)
    {
        return $this->divide($elements);
    }

    protected function divide($elements)
    {
        if (count($elements) === 1) return $elements; // если в массиве всего 1 эл, попали на него сразу, ничего менять не нужно - это лучший случай O(1)

        // нужно разъединить все элементы массива по одному
        $middle = count($elements) / 2;
        $left = array_slice($elements, 0, $middle);
        $right = array_slice($elements, $middle);
        $left = $this->divide($left);
        $right = $this->divide($right);
        return $this->merge($left, $right);
    }

    protected function merge($left, $right)
    {
        $result = [];
        while (count($left) > 0 && count($right) > 0) {                     // O(n) 
            if ($left[0]['price'] > $right[0]['price'] && !is_null($right[0]['price'])) {
                $result[] = $right[0];
                $right = array_slice($right, 1);
            } else {
                $result[] = $left[0];
                $left = array_slice($left, 1);
            }
        }

        while (count($left) > 0) {      //+ O(log n) 
            $result[] = $left[0];
            $left = array_slice($left, 1);
        }

        while (count($right) > 0) {
            $result[] = $right[0];
            $right = array_slice($right, 1);
        }

        return $result;
    }
}

$prices = [
    [
        'price' => 21999,
        'shop_name' => 'Shop 1',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21550,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21950,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21350,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ],
    [
        'price' => 21050,
        'shop_name' => 'Shop 2',
        'shop_link' => 'http://'
    ],
    // [
    //     'price' => 21550,
    //     'shop_name' => 'Shop 2',
    //     'shop_link' => 'http://'
    // ],
    // [
    //     'price' => 22050,
    //     'shop_name' => 'Shop 2',
    //     'shop_link' => 'http://'
    // ],
    // [
    //     'price' => 24050,
    //     'shop_name' => 'Shop 2',
    //     'shop_link' => 'http://'
    // ],
    // [
    //     'price' => 26550,
    //     'shop_name' => 'Shop 2',
    //     'shop_link' => 'http://'
    // ],
    // [
    //     'price' => 22650,
    //     'shop_name' => 'Shop 2',
    //     'shop_link' => 'http://'
    // ],
    // [
    //     'price' => 22350,
    //     'shop_name' => 'Shop 2',
    //     'shop_link' => 'http://'
    // ]
];
$sorter = new Sorter();

echo 'ShellSort' . PHP_EOL;
var_dump($sorter->ShellSort($prices));

echo 'Число шагов - в нашем случае было 7/на 5 элементов массива. 17шагов/7эл, 25/10' . PHP_EOL .
    'Вычислительная сложность в целом: в худшем случае – O(N^2),' . PHP_EOL .
    'в среднем – около O(N^3/2), когда точнее считала через систему уравнений - получается чем больше у нас будет обьектов в массиве, тем ближе к (N^3/2); ' . PHP_EOL .
    'в лучшем O(1) - по идее, если вдруг сразу попадем на единственный элемент, передвинув который остальные элементы массива встали бы в нужном порядке, но вероятность возникновения такого случая небольшая. разве что чем меньше элементов будет в массиве, тем она будет возрастать. именно в нашем примере лучший возникнуть не может' . PHP_EOL;


echo PHP_EOL . 'mergeSort. Сложность O(n) или O(n log n) ' . PHP_EOL;
var_dump($sorter->mergeSort($prices));
