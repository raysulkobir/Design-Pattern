<?php
    include "inc/header.php";
?>
<div class="para">
    <?php
    // Strategy interface
    interface SortStrategy
    {
        public function sort(array $data): array;
    }

    // Concrete strategy classes
    class BubbleSort implements SortStrategy
    {
        public function sort(array $data): array
        {
            // Implement bubble sort algorithm
            // ...
            return $data;
        }
    }

    class QuickSort implements SortStrategy
    {
        public function sort(array $data): array
        {
            // Implement quick sort algorithm
            // ...
            return $data;
        }
    }

    class MergeSort implements SortStrategy
    {
        public function sort(array $data): array
        {
            // Implement merge sort algorithm
            // ...
            return $data;
        }
    }

    // Context class
    class Sorter
    {
        private $strategy;

        public function setStrategy(SortStrategy $strategy)
        {
            $this->strategy = $strategy;
        }

        public function performSort(array $data): array
        {
            return $this->strategy->sort($data);
        }
    }

    // Client code
    $sorter = new Sorter();
    $sorter->setStrategy(new QuickSort()); // Switch strategies easily

    $data = [/* array elements */];
    $sortedData = $sorter->performSort($data);
    ?>


</div>

<?php include "inc/footer.php"; ?>