<?php
//1. Реализовать вывод меню на основе Closure table. 
// У меня xampp глохнет, если использовать рекурсию, поэтому поделила на 2 функции
class Connect
{
    public function connectDB($db)
    {
        $connect = mysqli_connect("localhost", "root", "", "alg");
        $query = "SELECT * FROM $db";
        $result = mysqli_query($connect, $query);
        $items = [];
        if ($db === 'Closure') {
            return Connect::connectClosure($result, $items);
        } elseif ($db === 'Nested') {
            return Connect::connectNested($result, $items);
        }
    }

    protected function connectClosure($result, $items)
    {
        while ($item = mysqli_fetch_assoc($result)) {
            $items[$item["ancestor"]][$item["descendant"]] = $item;
        }

        return $items;
    }

    protected function connectNested($result, $items)
    {
        while ($item = mysqli_fetch_assoc($result)) {
            $items[] = $item;
        }
        return $items;
    }
}

class ClosureT
{

    public function buildMenu($items, $ancestor)
    {
        if (is_array($items) && isset($items[$ancestor])) {
            $menu = "<ul>";
            foreach ($items[$ancestor] as $item) {
                $menu .= "<li>" . $item["text"];
                $menu .= $this->getDescendants($items, $item["descendant"]);
                $menu .= "</li>";
            }
            $menu .= "</ul>";
            return $menu;
        }
    }

    protected function getDescendants($items, $descendant)
    {
        $branch = "<ul>";
        foreach ($items[$descendant] as $item) {
            $branch .= "<li>" . $item["text"];
            // если в таблице вложенности будет больше, придется добавлять. Рекурсия бы решила проблему намного лучше
            // $branch .= $this->getDescendants($items, $item["descendant_second"]);
            $branch .= "</li>";
        }
        $branch .= "</ul>";
        return $branch;
    }
}

$closureTableMenu = new ClosureT();
echo $closureTableMenu->buildMenu(Connect::connectDB('Closure'), 0);
?>

<hr style="margin: 30px;">
<a href="palindrome.php"><button style="margin-left: 40%;"> проверить является ли слово палиндромом </button></a>
<hr style="margin: 30px;">

<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/NestedSetModel.svg/600px-NestedSetModel.svg.png" height="250px">
<br />

<?php
// 3. *Рассмотреть структуру данных Nested Sets. Реализовать ее хранение и вывод меню. 

class NestedSet
{
    protected function sortArray($items)
    {
        $left = array();
        $depth = array();
        for ($i = 0; $i < count($items); $i++) {
            $left[] = $items[$i]['left'];
            $depth[] = $items[$i]['depth'];
        }
        array_multisort(
            $left,
            SORT_ASC,
            SORT_NUMERIC,
            $depth,
            SORT_ASC,
            $items
        );
        return $this->buildBranch($items); // теперь они отсортированы в порядке как по оси на картинке
    }

    protected function buildBranch($items)
    {
        $menu = "<ul>";
        foreach ($items as $item) {
            $menu .= "<li>" . $item["node"];

            $menu .= "</li>";
        }
        $menu .= "</ul>";
        echo $menu;
        return $this->buildBranch2($items, 0);
    }

    protected function buildBranch2($items, $i)
    {
        $menu = "<ul>";
        for ($i; $i <= count($items); $i++) {
            $menu .= "<li>" . $items[$i]["node"];

            if ($items[$i]["depth"] < $items[($i++)]["depth"]) {
                $this->buildBranch2($items, $i);
            }

            $menu .= "</li>";
        }
        $menu .= "</ul>";
        echo $menu;
    }


    public function buildMenu($items)
    {
        $this->sortArray($items);
    }
}





$nestedSetMenu = new NestedSet();
$nestedSetMenu->buildMenu(Connect::connectDB('Nested'));
