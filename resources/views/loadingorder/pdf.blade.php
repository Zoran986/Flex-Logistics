<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Transport Order</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-black font-sans">

    {{-- A4 PAGE --}}
    <div class="w-[210mm] h-[297mm] mx-auto px-[20mm] py-[15mm] text-[12px] leading-[1.45]">

        {{-- COMPANY --}}
        <div class="font-semibold mb-10">
            ({{ 'TRAKSI LTD DOOEL SKOPJE' }})
        </div>

        {{-- TITLE --}}
        <div class="text-center text-lg font-bold mb-12">
            Transport order / Nalog za utovar {{ $loadingOrder->loading_order_number ?? '002/25' }}
        </div>

        {{-- TABLE --}}
        <table class="w-full border border-black border-collapse">
            <tbody>

                {{-- 1 --}}
                <tr>
                    <td class="border border-black w-[10%] text-center font-semibold">1.</td>
                    <td class="border border-black w-[30%] px-2">
                        Driver<br><span class="italic">Vozac</span>
                    </td>
                    <td class="border border-black w-[60%] px-2">
                        {{ $loadingOrder->driver ?? 'Mario Macak' }}
                    </td>
                </tr>

                {{-- 2 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">2.</td>
                    <td class="border border-black px-2">
                        Truck No.<br><span class="italic">Br. na kamion</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->truck_number }}
                    </td>
                </tr>

                {{-- 3 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">3.</td>
                    <td class="border border-black px-2">
                        Destination<br><span class="italic">Relacija</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->destination }}
                    </td>
                </tr>

                {{-- 4 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">4.</td>
                    <td class="border border-black px-2">
                        Date of loading<br><span class="italic">Data na utovar</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->date_of_loading }}
                    </td>
                </tr>

                {{-- 5 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">5.</td>
                    <td class="border border-black px-2">
                        Place of loading<br><span class="italic">Mesto na utovar</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->place_of_loading }}
                    </td>
                </tr>

                {{-- 6 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">6.</td>
                    <td class="border border-black px-2">
                        Type of goods<br><span class="italic">Vid na roba</span>
                    </td>
                    <td class="border border-black px-2">

                        @foreach ($loadingOrder->cars->groupBy(fn($car) => $car->mark . ' ' . $car->model) as $carGroup)
                            <div class="mb-2">
                                <p class="font-semibold">
                                    Cars: {{ $carGroup->first()->mark }} {{ $carGroup->first()->model }}
                                </p>

                                <ul class="font-semibold">
                                    Vin:
                                    @foreach ($carGroup as $car)
                                        <li>{{ $car->vin }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach

                    </td>
                </tr>

                {{-- 7 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">7.</td>
                    <td class="border border-black px-2">
                        Export customs<br><span class="italic">Izvozna carina</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->export_customs }}
                    </td>
                </tr>

                {{-- 8 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">8.</td>
                    <td class="border border-black px-2">
                        Import customs<br><span class="italic">Uvozna carina</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->import_customs }}
                    </td>
                </tr>

                {{-- 9 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">9.</td>
                    <td class="border border-black px-2">
                        Date of unloading<br><span class="italic">Data na istovar</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->date_of_unloading }}
                    </td>
                </tr>

                {{-- 10 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">10.</td>
                    <td class="border border-black px-2">
                        Place of unloading<br><span class="italic">Mesto na istovar</span>
                    </td>
                    <td class="border border-black px-2">
                        {{ $loadingOrder->place_of_unloading }}
                    </td>
                </tr>

                {{-- 11 --}}
                <tr>
                    <td class="border border-black text-center font-semibold">11.</td>
                    <td class="border border-black px-2">
                        Important<br><span class="italic">Vazno</span>
                    </td>
                    <td class="border border-black px-2">
                        Truck driver at loading receives invoices and export documents
                    </td>
                </tr>

            </tbody>
        </table>

        {{-- SIGNATURE --}}
        <div class="mt-10 text-right">
            (pečat od firma i potpis od nalogodavacot)
        </div>

        {{-- CONDITIONS --}}
        <div class="mt-8">
            <strong>ДОПОЛНИТЕЛНИ УСЛОВИ ЗА ИЗВРШУВАЊЕ НА ПРЕВОЗОТ:</strong>
            <div class="border-b border-black mt-2 mb-4"></div>

            <p class="mt-4">
                Сите елементи од налогот за утовар да се пополнат како услов за успешно извршување на преземената
                обврскa превоз.
            </p>

            <p class="mt-4 text-justify">
                <strong>НАПОМЕНА:</strong>
                Превозникот одговара за точна ,сигурна и навремена испорака на робата.Одговарноста е колaтерална и се
                изzема од секаква одговорност во поглед на разлики во видот и количината на робата во пакувањата
                споредено со наименувањата во документите кои ја пратат робата.
                За неисполнување на наименувањата од налогот за утовар се применуваат одредбите од Законот за
                облигациони односи – глава ПРЕВОЗ.
            </p>
        </div>

        {{-- FOOTER --}}
        <div class="absolute bottom-[20mm] left-[20mm] right-[20mm] flex justify-between">
            <div>
                Транспортер<br>
                ___________________
            </div>
            <div>
                Оверено од:<br>
                ___________________
            </div>

            <div>
                Налогодавател<br>
                ___________________
            </div>
        </div>

    </div>

</body>

</html>
