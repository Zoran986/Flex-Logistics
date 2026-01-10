<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Фактура {{ $invoice->invoice_number }} </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 text-gray-900 relative">



    <img class="block mx-auto"  src="{{ public_path('images/flex-logo.png') }}" alt="Лого на компанијата" >
    
    <div class="mt-2">
        <p>Друштво за транспорт и услуги</p>
        <p><strong>ТРАКСИ ЛТД ДООЕЛ Скопје</strong></p>
    </div>
    <div class="mb-5 grid justify-end ">
        <div class="border border-gray-400 p-2 text-[14px]">
        <p><strong>До:</strong> {{ $invoice->company->name }}</p>
        <p><strong>Адреса:</strong> {{ $invoice->company->address }}</p>
        <p><strong>Град:</strong>{{ $invoice->company->city }} {{ $invoice->company->postal_code }}</p>
        <p><strong>Држава:</strong>{{ $invoice->company->country }}</p>
        <p><strong>ЕДБ:</strong>{{ $invoice->company->tax_id }}</p>
        </div>
        
     </div>

    <h1 class="text-base font-bold mb-3">ФАКТУРА БРОЈ: {{ $invoice->formatted_number }}</h1>

    <p><strong>Датум на извршен промет:</strong> {{ $invoice->date_issued->format('d/m/Y') }}</p>
        <p><strong>Датум на валута:</strong> {{ $invoice->date_payment->format('d/m/Y') }}</p>

    <div>
    <div class="relative ">
        <img src="{{ public_path('images/pozadina.png') }}" 
             class="absolute inset-0 w-full opacity-20 -z-10 " 
             alt="">
   
    <table   class=" relative w-full border-collapse border border-gray-400 mb-6 text-base">
        <thead>
           
            <tr>
                <th class="border border-gray-400 p-2">Ред. БР</th>
                <th class="border border-gray-400 p-2">Опис</th>
                <th class="border border-gray-400 p-2">Кол.</th>
                <th class="border border-gray-400 p-2">Ед. цена</th>
                <th class="border border-gray-400 p-2">Износ</th>
                
            </tr>
           
            
        </thead>
        <tbody>
        
            <tr class="">
                <td class="border border-gray-400 p-2">1.</td>
               
                 @php
                $carsCount = $invoice->cars()->count();
                $total = $carsCount * floatval($invoice->amount);
                $totalWords = numberToMacedonianWords($total);
                $gluedWords = str_replace(' ', '', $totalWords);
                @endphp
                <td class="border border-gray-400 p-2"><p>Меѓународен транспорт на {{ $carsCount }}  @if (
                   $carsCount == 1 )
                   половно возило
                @else
                   половни возила
                @endif со број на шасија:</p></td>
                <td class="border border-gray-400 p-2">{{ $carsCount }}</td>
                <td class="border border-gray-400 p-2"> {{ number_format($invoice->amount, 2) }}</td>
                <td class="border border-gray-400 p-2"> {{ number_format($total, 2) }}</td>  
            </tr>
            <tr>
                <td></td>
                <td class=" border border-gray-400 p-2"> 
                @foreach($invoice->cars as $car )
                   <p>{{ $car->vin }}</p> 
                @endforeach
                РЕЛАЦИЈА:<br>
                {{ $invoice->route->destination }}
                    </p>
                </td>
                <td></td>
                <td class="p-2">Износ:</td>
                <td class="border border-gray-400 p-2">{{ number_format($total, 2) }}</td>
            </tr>
            <tr class="border border-gray-400">
                <td class="border border-gray-400 p-2">CMR:{{ $invoice->cmr }}</td>
                <td class="border border-gray-400 p-2">Рег. ознаки на возило <br>{{ $invoice->driver->truck->plate_number }}</td>
                <td class=" p-2"></td>
                <td class="p-2">ДДВ 0%</td>
                <td class="border border-gray-400 p-2">0,00</td>
            </tr> 
            <tr>
                <td></td>
                <td class="text-sm">Со букви: {{ ucfirst($gluedWords) }}денари</td>
                <td></td>
                <td class="border border-gray-400 p-1"><strong>Вкупно за наплата во МКД </strong></td>
                <td class="border border-gray-400 p-2">{{ number_format($total, 2) }}</td>
            </tr>        
        </tbody>    
    </table>
    </div>
    
    <div class="grid justify-items-start  grid-cols-3">
        <div>Овластено лице:</div>
        <div>Примил:</div>
        <div>Директор:</div>
    </div>

    <div class="pt-10">
        <hr class="border-gray-400">
    </div>

    
    <footer class="text-xs pb-2 fixed bottom-2 left-10 right-10">
        <p>Напомена: Ве молиме на уплатата да го ставите бројот на фактура. Наплатата се врши исклучиво во денари.
            За ненавремено плаќање пресметуваме законска казнена камата. Во случај на спор надлежен е Основен суд во 
            Скопје. Рекламации примаме во рок од 3 дена со уреден записник.
        </p>
        <div class="flex justify-center">
              <p><strong>Meѓународен транспорт е ослободен од ДДВ по член 24 точка 3 од ЗДДВ</strong></p>
        </div>

        <div class="grid grid-flow-col justify-items-center-safe ">
            <div class=" border border-gray-400 p-2">Тракси ЛТД ДООЕЛ Скопје <br> Ул. Димо Хаџи Димов бр.71 <br> 1000 Скопје, Република Северна Македонија <br>Даночен број: 4058019531786</div>
            <div class="border border-gray-400 p-2">НЛБ ТУТУНСКА БАНКА <br> Жиро с-ка: 210073300220158                   
                        <hr class="border-gray-400 ">
                <p>ХАЛК БАНКА <br> Жиро с-ка: 270073300220165</p>
            </div>
            <div class="border border-gray-400 p-2">e_mail: traksiltd@gmail.com <br> mob +389 75 321 222 <br> www.tarksi.mk</div>
        </div>
    
        
    </footer>
</body>


</html>
