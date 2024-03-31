<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class MemberExport implements FromView
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class    => function(BeforeSheet $event) {
                // Or via magic __call
                $event->sheet
                ->getPageSetup()
                ->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
            },
        ];
    }

    public function view(): View
    {
        return view('exports.members', [
            'data' => $this->data,
        ]);
    }
}
