<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guaranty Bond</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white text-black font-sans">

{{-- A4 PAGE --}}
<div class="w-[210mm] h-[297mm] mx-auto px-[20mm] py-[15mm] text-[12px] leading-[1.45]">

    {{-- HEADER --}}
    <div class="flex items-center justify-between border-b border-black pb-3 mb-8">
        <img src="{{ public_path('images/logo-02.png') }}" class="h-14">
        <div class="flex gap-6">
            <img src="{{ public_path('images/iso.png') }}" class="h-11">
            <img src="{{ public_path('images/net.png') }}" class="h-11">
        </div>
    </div>

    {{-- TITLE --}}
    <div class="text-center text-xl font-bold underline mb-10">
        Guaranty Bond
    </div>

    {{-- BODY --}}
    <div class="space-y-6">

        <p>
            <span class="inline-block border-b border-black min-w-[200px] text-center">
                {{ $guarantee->firm ?? '' }}
            </span>
            based in
            <span class="inline-block border-b border-black min-w-[200px] text-center">
                {{ $guarantee->place ?? '' }}
            </span>
            hereby undertakes,<br>
             (<em>name of the person or firm – the Guarantor</em>)
            <span class="inline-block  min-w-[100px] text-center ">
            </span>
            (<em>place</em>)
        </p>

        
        <p class="text-justify">
            in the event of incorrectly accomplished transit procedure or non-delivery
            of goods involved in transit procedure to the Customs authority at destination,
            transported by the carrier
            <span class="inline-block border-b border-black min-w-[180px] text-center">
                {{ $guarantee->carrier ?? '' }}
            </span>
            by vehicle reg. no.
            <span class="inline-block border-b border-black min-w-[120px] text-center">
                {{ $guarantee->vehicle_registration ?? '' }}
            </span>,
            description of goods
            <span class="inline-block border-b border-black min-w-[200px] text-center">
                {{ $guarantee->description_of_goods ?? 'Cars' }}
            </span>,
            weight in kg
            <span class="inline-block border-b border-black min-w-[80px] text-center">
                {{ $guarantee->cars->sum('car_mass') }}
            </span>,
            value of goods
            <span class="inline-block border-b border-black min-w-[120px] text-center">
                € {{ number_format($guarantee->cars->sum('price'), 2) }}
            </span>,
            upon first call by <strong>Intereuropa d.d.</strong>, without objection,
            shall pay all costs and expenses, fines and customs duty and other levies
            arising from non-delivery of the goods and documents.
        </p>

        <p class="text-justify">
            The undersigned also binds himself/herself, for the need for presenting the
            evidence to resolve a particular case, to provide all his/her support in
            searching for documents to evidence that the respective transit procedure
            has been accomplished/complete.
        </p>

    </div>

    {{-- SIGNATURE AREA --}}
    <div class="mt-16">

        <div class="flex justify-between mb-12">
            <div>
                <div class="border-b border-black w-[70mm]"></div>
                <div class="mt-1">(Place, Date)</div>
            </div>

           
        </div>

         <div class="mb-8">
                <div class="border-b border-black w-[70mm]"></div>
                <div class="mt-1">(Guarantor’s Address)</div>
        </div>

         <div class="mb-12">
            <div class="border-b border-black w-[70mm]"></div>
            <div class="mt-1">(Phone no.)</div>
        </div>

        <div class="justify-items-end ">

            <div class="mb-8">
                <div class="border-b border-black w-[70mm]"></div>
                <div class="mt-1">(Guarantor’s Stamp)</div>
            </div>

            <div class="mb-10">
                <div class="border-b border-black w-[70mm]"></div>
                <div class="mt-1">
                    (Guarantor’s authorized representative:<br> first and family name – please write out legibly)
                </div>
            </div>

            <div>
                <div class="border-b border-black w-[70mm]"></div>
                <div class="mt-1">(Guarantor’s signature)</div>
            </div>

        </div>
        
    </div>

    {{-- FOOTER --}}
    <div class="absolute bottom-[15mm] left-[20mm] text-xs">
        ŠP-O-163/2
    </div>

</div>

</body>
</html>

