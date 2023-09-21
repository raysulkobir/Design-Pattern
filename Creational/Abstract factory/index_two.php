<?php
interface WriterFactory
{
    public function createCsvWriter(): CsvWriter;
    public function createJsonWriter(): JsonWriter;
}


class WinWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new WinCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new WinJsonWriter();
    }
}

interface CsvWriter
{
    public function write(array $line): string;
}

class WinCsvWriter implements CsvWriter
{
    public function write(array $line): string
    {
        return join(',', $line) . "\r\n";
    }
}

interface JsonWriter
{
    public function write(array $data, bool $formatted): string;
}

class WinJsonWriter implements JsonWriter
{
    public function write(array $data, bool $formatted): string
    {
        $options = 0;

        if ($formatted) {
            $options = JSON_PRETTY_PRINT;
        }

        return json_encode($data, $options);
    }
}


$factory = new WinWriterFactory();

$csvWriter = $factory->createCsvWriter();
echo $csvString = $csvWriter->write(['field1', 'field2']);

$jsonWriter = $factory->createJsonWriter();
$jsonString = $jsonWriter->write(['key1' => 'value1', 'key2' => 'value2'], true);


