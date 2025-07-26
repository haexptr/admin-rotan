<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Support\Collection;

trait ExportableTrait
{
    /**
     * Export data to CSV format
     */
    public function exportToCsv(Collection $data, array $headers, string $filename): Response
    {
        $csvData = [];
        
        // Add headers
        $csvData[] = $headers;
        
        // Add data rows
        foreach ($data as $row) {
            $csvRow = [];
            foreach ($headers as $key => $header) {
                if (is_numeric($key)) {
                    $csvRow[] = $row->{strtolower(str_replace(' ', '_', $header))} ?? '';
                } else {
                    $csvRow[] = $row->{$key} ?? '';
                }
            }
            $csvData[] = $csvRow;
        }
        
        // Create CSV content
        $output = fopen('php://temp', 'r+');
        foreach ($csvData as $row) {
            fputcsv($output, $row);
        }
        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);
        
        // Return response
        return response($csvContent)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '.csv"');
    }
    
    /**
     * Export data to Excel-like format (HTML table that Excel can open)
     */
    public function exportToExcel(Collection $data, array $headers, string $filename): Response
    {
        $html = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>' . $filename . '</title></head><body>';
        $html .= '<table border="1" style="border-collapse: collapse;">';
        
        // Add headers
        $html .= '<tr style="background-color: #f3f4f6; font-weight: bold;">';
        foreach ($headers as $header) {
            $html .= '<th style="padding: 8px; border: 1px solid #ccc;">' . htmlspecialchars($header) . '</th>';
        }
        $html .= '</tr>';
        
        // Add data rows
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($headers as $key => $header) {
                $value = '';
                if (is_numeric($key)) {
                    $value = $row->{strtolower(str_replace(' ', '_', $header))} ?? '';
                } else {
                    $value = $row->{$key} ?? '';
                }
                $html .= '<td style="padding: 8px; border: 1px solid #ccc;">' . htmlspecialchars($value) . '</td>';
            }
            $html .= '</tr>';
        }
        
        $html .= '</table></body></html>';
        
        return response($html)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '.xls"');
    }
}