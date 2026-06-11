<style>
    @media print {
        nav, .bg-gray-800, form, .gap-3, a, button {
            display: none !important;
        }
        body {
            background: white !important;
        }
        .rounded-3xl {
            border-radius: 0 !important;
            box-shadow: none !important;
            border: none !important;
        }
        .bg-white {
            background: white !important;
        }
        .shadow-2xl {
            box-shadow: none !important;
        }
        .mb-12 {
            margin-bottom: 0 !important;
        }
        table {
            width: 100% !important;
            border-collapse: collapse !important;
        }
        th, td {
            border: 1px solid #e5e7eb !important;
            padding: 8px !important;
        }
        .print-bg-orange {
            background-color: #FF7A00 !important;
            -webkit-print-color-adjust: exact;
        }
        .text-white {
            color: white !important;
            -webkit-print-color-adjust: exact;
        }
        .text-blue-600 {
            color: #2563eb !important;
        }
        body * {
            visibility: hidden;
        }
        #print-report-view, #print-report-view * {
            visibility: visible;
        }
        #print-report-view {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            display: block !important;
        }
        .print\:hidden, #dashboard-report-view, .xl\:flex-row, form {
            display: none !important;
        }
    }

    .date-input-picker::-webkit-calendar-picker-indicator {
        display: block !important;
        cursor: pointer;
        filter: invert(0.5);
    }
</style>
