<?php include "inc/header.php" ?>

The design patterns are cool! I tried to learn a few design patterns. But failed always. It’s hard to memorize and I forget easily 🙄. At least I find it hard. But, recently I came to know a design pattern which is the Decorator Design Pattern. Before I dive into the code let’s just have an understanding of what it is.

Suppose, you went to have burgers with your friends. The burger costs you $4. But you want to add some addons. Extra cheese & sauce. You may also like an extra patty. But they also require some extra cash to be paid. This is in terms of the design pattern called the Decorator Pattern. It’s still a burger but it requires some extra price to decorate. Let’s dive into the code to get an idea.
<h1>Decorator Patter</h1>
<hr />
<?php

class Article
{
    private $title, $time;

    function __construct($title, $time)
    {
        $this->title = $title;
        $this->time = $time;
    }

    function getTitle()
    {
        $this->title;
    }

    function getTime()
    {
        $this->time;
    }

    function displayTitleTime()
    {
        $title = $this->getTitle();
        $date = date('Y/m/d H:i:s', $this->getTime());
        echo "{$title} was published date {$date}";
    }
}


class ArticleTimeDecorator
{
    private $article;

    function __construct(Article $article)
    {
        $this->article = $article;
    }

    function displayTitleTime()
    {
        $title = $this->article->getTitle();
        $date = $this->article->getTime();
        echo "{$title} was published {$date}";
    }

 


}


$article = new Article("This is a title", time() + 400);
// $a->displayTitleTime();
$ar = new ArticleTimeDecorator($article);
$ar->displayTitleTime();



?>

<?php include "inc/footer.php" ?>