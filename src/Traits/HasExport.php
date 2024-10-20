<?php

declare(strict_types=1);

namespace Rakoitde\Table\Traits;

trait HasExport
{
    /**
     * CSV Eport
     *
     * @param      <type>  $result   The result
     * @param      <type>  $headers  The headers
     */
    public function exportCsv()
    {
        // file name
        $filename = $this->getId() . '_' . date('Ymd') . '.csv';
        header('Content-Description: File Transfer');
        header("Content-Disposition: attachment; filename={$filename}");
        header('Content-Type: application/csv; charset=utf-8');

        // get data
        $result  = $this->createEntities(asArray: true, disablePagination: true);
        $columns = $this->getVisibleColumnArray();

        // file creation
        $file = fopen('php://output', 'wb');
        fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

        $header = array_values($columns);
        $keys   = array_keys($columns);
        fputcsv($file, $header, ';');
        // fputcsv($file, $keys, ";");

        foreach ($result as $line) {
            $newLine = [];

            foreach ($keys as $key) {
                // if (!isset($line[$key])) { continue; }
                $newLine[$key] = $line[$key] ?? '';
            }

            // dd($header, $keys, $line, $newLine, $columns);

            fputcsv($file, $newLine, ';');
        }
        fclose($file);

        exit;
    }
}
