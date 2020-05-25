<?php

/**
 * Class quickSort
 */
class quickSort
{
    /**
     * Notes: This is quickSort function
     * @author supengfei <tianqibucuo9189@163.com>
     * @link https://github.com/supengfei0625/quick-sort
     * Date: 2020/5/25
     * Time: 11:11
     * @param $arr
     * @return array
     */
    public static function quickSort($arr)
    {
        //判断数组元素个数是否还需继续排序
        $len = count($arr);
        if ($len <= 1) //数组只剩一个元素时，不需要继续排序
        {
            return $arr;
        }
        //定义基准（取数组第一个元素），用于和组内元素比较大小
        $midd = $arr[0];
        //定义小于基准的数组
        $min = [];
        //定义大于基准的数组
        $max = [];
        //根据基准循环判断大小，并赋值给两个数组
        for($i = 1; $i < $len; $i++)
        {
            if($midd > $arr[$i])
            {
                $min[] = $arr[$i]; //小于基准的元素，全部放到左侧
            }else{
                $max[] = $arr[$i]; //大于基准的元素，全部放到右侧
            }
        }
        /**
        循环第一次结束后$min打印结果为所有小于12的元素，都放在$min中,
        echo '<pre>';print_r($min);die;
        <pre><pre>Array
        (
        [0] => 6
        [1] => 7
        [2] => 3
        [3] => 5
        [4] => 2
        [5] => 8
        )
        循环第二遍时，会以6为基准，比较和6的大小，直至数组内只剩下一个元素，比较结束
        ###--------------------------------------------------####
        循环第一次结束后数组$max打印结果为所有大于12的元素，都放在$max中
        echo '<pre>';print_r($max);die;
        <pre><pre>Array
        (
        [0] => 13
        [1] => 21
        )
         **ps：这时用基准判别大于或小于的所有数已经分出来了，但是数组顺序还不是我们想要的正序，下面递归会
        继续调用，直至数组内元素只剩下一个，程序执行结束。**
         */
        //递归继续排序
        $min = self::quickSort($min);
        $max = self::quickSort($max);
        //合并最终的数组
        return array_merge($min,array($midd),$max);
    }
}
$arr = [12,6,13,7,3,5,2,8,21]; //测试数据
echo '<pre>';print_r(quickSort::quickSort($arr));