<?php
class Converter
{
    public static $result;

    // проверяет что задана строка
    public function convert(string $equation)
    {
        if (!is_null($equation)) {
            return Converter::divide($equation);
        } else {
            throw new Exception('Не ввели уравнение!!');
        }
    }

    // разделяет по принципу знак+число и записывает это значение как массив в массиве результата конвертации
    protected function divide(string $equation)
    {
        preg_match_all(
            "/[\+|\-|\^|\*|\/]?[A-Za-z0-9]+/",
            $equation,
            Converter::$result,
            PREG_OFFSET_CAPTURE
        );
        Converter::$result = Converter::$result[0]; // убираем лишний уровень в массиве, иначе получалось массив[0]->массив[наши массивы с числами]

        return  Converter::assign();
    }

    // настройки под именно наш пример
    protected function assign()
    {
        Converter::$result[5]['parent'] = 0; // родителей нет
        Converter::$result[5]['id'] = 5; // id - это порядок выполнения действия 

        // Converter::$result[0] = array_merge(Converter::$result[0], Converter::$result[1]);

        Converter::$result[3]['parent'] = 1;
        Converter::$result[3]['id'] = 4;

        Converter::$result[2]['parent'] = 2;
        Converter::$result[2]['id'] = 2;

        Converter::$result[4]['parent'] = 2;
        Converter::$result[4]['id'] = 3;

        Converter::$result[0]['parent'] = 3;
        Converter::$result[0]['id'] = 1;

        Converter::$result[1]['parent'] = 3;
        Converter::$result[1]['id'] = 1;

        return Converter::$result;
    }
}


class Tree
{
    public $root;
    public $tree;

    public function buildTree($items)
    {
        return $this->findRoot($items);
    }

    protected function findRoot($items)
    {
        foreach ($items as $item) {
            if ($item['parent'] === 0) $this->root = $item;
        }

        return $this->buildBranch($items);
    }

    // protected function buildBranch($items)
    // {
    //     $this->tree['root'] = $this->root;

    //     // пока не дойдем до последнего действия по порядку (это действие вычитание у корня дерева (у нас -z)), то прикрепляем к ветке. Идем по порядку действий в математике, то есть по дереву снизу - вверх и до корня.
    //     for ($i = 1; $i < $this->tree['root']['id']; $i++) {

    //         foreach ($items as $item) {

    //             if ($item['parent'] === $i) {
    //                 $this->tree["branches"][] = $item;
    //             }
    //         }   
    //     }
    
    //     return $this->tree;
    // }

    
    protected function buildBranch($items) {
        $this->tree['root'] = $this->root;
        $i = 1;

        foreach ($items as $item) {
            if ($item['parent'] === $i) {
                $this->tree["branches"][] = $item;
            }
        } 

        $i++;
        foreach ($items as $item) {
            if ($item['parent'] === $i) {
                $this->tree["branches"]['branch'][] = $item;
            }
        }

        $i++;
        foreach ($items as $item) {
            if ($item['parent'] === $i) {
                $this->tree["branches"]['branch']['branch'][] = $item;
            }
        }

        return $this->tree;
    }




}

Converter::convert('(x+42)^2+7*y-z');

$tree = new Tree();
var_dump($tree->buildTree(Converter::convert('(x+42)^2+7*y-z')));
