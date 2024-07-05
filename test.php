<?php
class Test
{
    public $name = "Test";
    public function __construct()
    {
        echo "Hello World";
    }
    public function &getName()
    {
        return $this->name;
    }
}

$test = new Test();
echo $test->getName();
$test->name = "Test2";
echo $test->getName();

?>
<form>
    <input type="button">
    <input type="checkbox">
    <input type="color">
    <input type="date">
    <input type="datetime-local">
    <input type="email">
    <input type="file">
    <input type="hidden">
    <input type="image">
    <input type="month">
    <input type="number">
    <input type="password">
    <input type="radio">
    <input type="range">
    <input type="reset">
    <input type="search">
    <input type="submit">
    <input type="tel">
    <input type="text">
    <input type="time">
    <input type="url">
    <input type="week">
</form>