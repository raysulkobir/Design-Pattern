<?php

// Prototype pattern refers to creating duplicate object while keeping performance in mind. This type of design pattern comes under creational pattern as this pattern provides one of the best ways to create an object.

// This pattern involves implementing a prototype interface which tells to create a clone of the current object. This pattern is used when creation of object directly is costly. For example, an object is to be created after a costly database operation. We can cache the object, returns its clone on next request and update the database as and when needed thus reducing database calls.

// ContentPrototype.php (Prototype Interface)
interface ContentPrototype
{
    public function clone(): ContentPrototype;
    public function setTitle($title);
    public function setAuthor($author);
    public function setPublicationDate($date);
    public function getContent();
}

// Article.php (Concrete Prototype)
class Article implements ContentPrototype
{
    private $title;
    private $author;
    private $publicationDate;
    private $content;

    public function clone(): ContentPrototype
    {
        $clone = new Article();
        $clone->setTitle($this->title);
        $clone->setAuthor($this->author);
        $clone->setPublicationDate($this->publicationDate);
        $clone->setContent($this->content);
        return $clone;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setPublicationDate($date)
    {
        $this->publicationDate = $date;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return "Article - Title: {$this->title}, Author: {$this->author}, Published: {$this->publicationDate}\nContent: {$this->content}\n";
    }
}

// Video.php (Concrete Prototype)
class Video implements ContentPrototype
{
    private $title;
    private $author;
    private $publicationDate;
    private $videoUrl;

    public function clone(): ContentPrototype
    {
        $clone = new Video();
        $clone->setTitle($this->title);
        $clone->setAuthor($this->author);
        $clone->setPublicationDate($this->publicationDate);
        $clone->setVideoUrl($this->videoUrl);
        return $clone;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setPublicationDate($date)
    {
        $this->publicationDate = $date;
    }

    public function setVideoUrl($url)
    {
        $this->videoUrl = $url;
    }

    public function getContent()
    {
        return "Video - Title: {$this->title}, Author: {$this->author}, Published: {$this->publicationDate}\nVideo URL: {$this->videoUrl}\n";
    }
}

// Usage
$articlePrototype = new Article();
$articlePrototype->setTitle("Sample Article");
$articlePrototype->setAuthor("John Doe");
$articlePrototype->setPublicationDate("2023-09-21");
$articlePrototype->setContent("This is the content of the article.");

$newArticle = $articlePrototype->clone();
$newArticle->setTitle("New Article");
$newArticle->setPublicationDate("2023-09-22");

$videoPrototype = new Video();
$videoPrototype->setTitle("Sample Video");
$videoPrototype->setAuthor("Jane Smith");
$videoPrototype->setPublicationDate("2023-09-20");
$videoPrototype->setVideoUrl("https://www.example.com/video");

$newVideo = $videoPrototype->clone();
$newVideo->setTitle("New Video");
$newVideo->setPublicationDate("2023-09-23");

echo $newArticle->getContent();
echo $newVideo->getContent();
