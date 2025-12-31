<!DOCTYPE html>
<html>
    <head>
        <style>
            /* Style the tab */
            .tabs .nav {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #a4b5bd;
            }

            /* Style the buttons inside the tab */
            .tabs .nav .nav-item button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 5px 10px;
                transition: 0.3s;
                font-size: 15px;
                font-weight: 600;
            }

            .tabs .nav .nav-item .nav-link{
                color: #f3f7f9;
                padding: .3rem .3rem;
            }

            /* Change background color of buttons on hover */
            .tabs .nav .nav-item button:hover {
                background-color: #0066cc;
            } 

            /* Create an active/current tablink class */
            .tabs .nav .nav-item button.active {
                background-color: #0099cc;
                color: #fff
            }
        </style>
    </head>

    <body>
        <div class="tabs">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" onclick="openTab(event, 'tab1')" id="defaultOpen">Government</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openTab(event, 'tab2')">Banks</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openTab(event, 'tab3')">Financials</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openTab(event, 'tab4')">Micro Finance</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openTab(event, 'tab5')">National & International</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openTab(event, 'tab6')">Money Changers</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="openTab(event, 'tab7')">Credit Rating</button>
                </li>
            </ul>
        </div>

        <div id="tab1" class="tabcontent">
            <h3>Government Institution</h3>
            <p>
            <table class="table table-responsive-sm table-bordered table-striped">
                <tbody>
                    <tr>
                        <th class="table-danger">Organisation</th>
                        <th class="table-danger">Web Link</th>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.bbs.gov.bd" class="" target="_blank">Bangladesh Bureau of Statistics (BBS)</a>
                        </td>
                        <td>
                            <a href="http://www.bbs.gov.bd" class="" target="_blank">http://www.bbs.gov.bd</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.epzbangladesh.org.bd/" class="" target="_blank">Bangladesh Export Promotion Zones Authority (BEPZA)</a>
                        </td>
                        <td>
                            <a href="http://www.epzbangladesh.org.bd/" class="" target="_blank">http://www.epzbangladesh.org.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.forms.gov.bd/" class="" target="_blank">Bangladesh Government Official Forms</a>
                        </td>
                        <td>
                            <a href="http://www.forms.gov.bd/" class="" target="_blank">http://www.forms.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.bangladeshmuseum.gov.bd/" class="" target="_blank">Bangladesh National Museum</a>
                        </td>
                        <td>
                            <a href="http://www.bangladeshmuseum.gov.bd/" class="" target="_blank">http://www.bangladeshmuseum.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.parjatan.org/" class="" target="_blank">Bangladesh Parjatan Corporation (BPC)</a>
                        </td>
                        <td>
                            <a href="http://www.parjatan.org/" class="" target="_blank">http://www.parjatan.org/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.bangladeshpost.gov.bd" class="" target="_blank">Bangladesh Post Office</a>
                        </td>
                        <td>
                            <a href="http://www.bangladeshpost.gov.bd" class="" target="_blank">http://www.bangladeshpost.gov.bd</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.boi.gov.bd/" class="" target="_blank">Board of Investment (BOI)</a>
                        </td>
                        <td>
                            <a href="http://www.boi.gov.bd/" class="" target="_blank">http://www.boi.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.csebd.com/" class="" target="_blank">Chittagong Stock Exchange (CSE)</a>
                        </td>
                        <td>
                            <a href="http://www.csebd.com/" class="" target="_blank">http://www.csebd.com/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.dhakachamber.com/" class="" target="_blank">Dhaka Chamber of Commerce and Industries</a>
                        </td>
                        <td>
                            <a href="http://www.dhakachamber.com/" class="" target="_blank">http://www.dhakachamber.com/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.dsebd.org/" class="" target="_blank">Dhaka Stock Exchange (DSE)</a>
                        </td>
                        <td>
                            <a href="http://www.dsebd.org/" class="" target="_blank">http://www.dsebd.org/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.erd.gov.bd/" class="" target="_blank">Economic Relations Division (ERD)</a>
                        </td>
                        <td>
                            <a href="http://www.erd.gov.bd/" class="" target="_blank">http://www.erd.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.epb.gov.bd/" class="" target="_blank">Export Promotion Bureau (EPB)</a>
                        </td>
                        <td>
                            <a href="http://www.epb.gov.bd/" class="" target="_blank">http://www.epb.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.fbcci-bd.org/" class="" target="_blank">Federation of Bangladesh Chamber of Commerce (FBCC)</a>
                        </td>
                        <td>
                            <a href="http://www.fbcci-bd.org/" class="" target="_blank">http://www.fbcci-bd.org/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.mof.gov.bd/" class="" target="_blank">Finance Ministry</a>
                        </td>
                        <td>
                            <a href="http://www.mof.gov.bd/" class="" target="_blank">http://www.mof.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.mra.gov.bd" class="" target="_blank">Microcredit Regulatory Authority</a>
                        </td>
                        <td>
                            <a href="http://www.mra.gov.bd" class="" target="_blank">http://www.mra.gov.bd</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.mopa.gov.bd/" class="" target="_blank">Ministry of Public Administration</a>
                        </td>
                        <td>
                            <a href="http://www.mopa.gov.bd/" class="" target="_blank">http://www.mopa.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.nbr-bd.org/" class="" target="_blank">National Board of Revenue (NBR)</a>
                        </td>
                        <td>
                            <a href="http://www.nbr-bd.org/" class="" target="_blank">http://www.nbr-bd.org/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.bangladeshgov.org/mop/ndb/" class="" target="_blank">National Data Bank (NDB)</a>
                        </td>
                        <td>
                            <a href="http://www.bangladeshgov.org/mop/ndb/" class="" target="_blank">http://www.bangladeshgov.org/mop/ndb/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.pmo.gov.bd/" class="" target="_blank">Prime Minister's Office</a>
                        </td>
                        <td>
                            <a href="http://www.pmo.gov.bd/" class="" target="_blank">http://www.pmo.gov.bd/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.secbd.org/" class="" target="_blank">Securities and Exchange Commission (SEC)</a>
                        </td>
                        <td>
                            <a href="http://www.secbd.org/" class="" target="_blank">http://www.secbd.org/</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.spcbl.org.bd/" class="" target="_blank">The Security Printing Corporation (Bangladesh) Ltd (SPCBL)</a>
                        </td>
                        <td>
                            <a href="http://www.spcbl.org.bd/" class="" target="_blank">http://www.spcbl.org.bd/</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </p>

    </div>

    <div id="tab2" class="tabcontent">
        <h3>Banks</h3>
        <p>
        <table class="table table-responsive-sm table-bordered table-striped">
            <tbody>
                <tr>
                    <th class="table-danger">Organisation</th>
                    <th class="table-danger">Web Link</th>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.abbl.com" class="" target="_blank">AB Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.abbl.com" class="" target="_blank">http://www.abbl.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.agranibank.org" class="" target="_blank">Agrani Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.agranibank.org" class="" target="_blank">http://www.agranibank.org</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.al-arafahbank.com/" class="" target="_blank">Al-Arafah Islami Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.al-arafahbank.com/" class="" target="_blank">http://www.al-arafahbank.com/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.bcbl-bd.com" class="" target="_blank">Bangladesh Commerce Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.bcbl-bd.com" class="" target="_blank">http://www.bcbl-bd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.bdbl.com.bd" class="" target="_blank">Bangladesh Development Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.bdbl.com.bd" class="" target="_blank">http://www.bdbl.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.krishibank.org.bd" class="" target="_blank">Bangladesh Krishi Bank</a>
                    </td>
                    <td>
                        <a href="http://www.krishibank.org.bd" class="" target="_blank">http://www.krishibank.org.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.bankalfalah.com" class="" target="_blank">Bank Al-Falah Limited</a>
                    </td>
                    <td>
                        <a href="http://www.bankalfalah.com" class="" target="_blank">http://www.bankalfalah.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.bankasia-bd.com" class="" target="_blank">Bank Asia Limited</a>
                    </td>
                    <td>
                        <a href="http://www.bankasia-bd.com" class="" target="_blank">http://www.bankasia-bd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.basicbanklimited.com" class="" target="_blank">BASIC Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.basicbanklimited.com" class="" target="_blank">http://www.basicbanklimited.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.bracbank.com" class="" target="_blank">BRAC Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.bracbank.com" class="" target="_blank">http://www.bracbank.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.citi.com/domain/index.htm" class="" target="_blank">Citibank N.A</a>
                    </td>
                    <td>
                        <a href="http://www.citi.com/domain/index.htm" class="" target="_blank">http://www.citi.com/domain/index.htm</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.combankbd.com" class="" target="_blank">Commercial Bank of Ceylon Limited</a>
                    </td>
                    <td>
                        <a href="http://www.combankbd.com" class="" target="_blank">http://www.combankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.dhakabank.com.bd" class="" target="_blank">Dhaka Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.dhakabank.com.bd" class="" target="_blank">http://www.dhakabank.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.dutchbanglabank.com" class="" target="_blank">Dutch-Bangla Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.dutchbanglabank.com" class="" target="_blank">http://www.dutchbanglabank.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.ebl-bd.com" class="" target="_blank">Eastern Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.ebl-bd.com" class="" target="_blank">http://www.ebl-bd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.eximbankbd.com" class="" target="_blank">EXIM Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.eximbankbd.com" class="" target="_blank">http://www.eximbankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.fsiblbd.com" class="" target="_blank">First Security Islami Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.fsiblbd.com" class="" target="_blank">http://www.fsiblbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.habibbankltd.com" class="" target="_blank">Habib Bank Ltd.</a>
                    </td>
                    <td>
                        <a href="http://www.habibbankltd.com" class="" target="_blank">http://www.habibbankltd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.icbislamic-bd.com/" class="" target="_blank">ICB Islamic Bank Ltd.</a>
                    </td>
                    <td>
                        <a href="http://www.icbislamic-bd.com/" class="" target="_blank">http://www.icbislamic-bd.com/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.ificbankbd.com" class="" target="_blank">IFIC Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.ificbankbd.com" class="" target="_blank">http://www.ificbankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.islamibankbd.com" class="" target="_blank">Islami Bank Bangladesh Ltd</a>
                    </td>
                    <td>
                        <a href="http://www.islamibankbd.com" class="" target="_blank">http://www.islamibankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.jamunabankbd.com" class="" target="_blank">Jamuna Bank Ltd</a>
                    </td>
                    <td>
                        <a href="http://www.jamunabankbd.com" class="" target="_blank">http://www.jamunabankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.janatabank-bd.com" class="" target="_blank">Janata Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.janatabank-bd.com" class="" target="_blank">http://www.janatabank-bd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.meghnabank.com.bd" class="" target="_blank">Meghna Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.meghnabank.com.bd" class="" target="_blank">http://www.meghnabank.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.mblbd.com" class="" target="_blank">Mercantile Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.mblbd.com" class="" target="_blank">http://www.mblbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.midlandbankbd.net/" class="" target="_blank">Midland Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.midlandbankbd.net/" class="" target="_blank">http://www.midlandbankbd.net/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://modhumotibankltd.com/" class="" target="_blank">Modhumoti Bank Ltd.</a>
                    </td>
                    <td>
                        <a href="http://modhumotibankltd.com/" class="" target="_blank">http://modhumotibankltd.com/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.mutualtrustbank.com" class="" target="_blank">Mutual Trust Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.mutualtrustbank.com" class="" target="_blank">http://www.mutualtrustbank.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.nblbd.com" class="" target="_blank">National Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.nblbd.com" class="" target="_blank">http://www.nblbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.nbp.com.pk" class="" target="_blank">National Bank of Pakistan</a>
                    </td>
                    <td>
                        <a href="http://www.nbp.com.pk" class="" target="_blank">http://www.nbp.com.pk</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.nccbank.com.bd" class="" target="_blank">National Credit &amp; Commerce Bank Ltd</a>
                    </td>
                    <td>
                        <a href="http://www.nccbank.com.bd" class="" target="_blank">http://www.nccbank.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.nrbbankbd.com" class="" target="_blank">NRB Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.nrbbankbd.com" class="" target="_blank">http://www.nrbbankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.nrbcommercialbank.com/" class="" target="_blank">NRB Commercial Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.nrbcommercialbank.com/" class="" target="_blank">http://www.nrbcommercialbank.com/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.nrbglobalbank.com" class="" target="_blank">NRB Global Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.nrbglobalbank.com" class="" target="_blank">http://www.nrbglobalbank.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.onebankbd.com" class="" target="_blank">One Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.onebankbd.com" class="" target="_blank">http://www.onebankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.premierbankltd.com" class="" target="_blank">Premier Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.premierbankltd.com" class="" target="_blank">http://www.premierbankltd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="https://www.primebank.com.bd/" class="" target="_blank">Prime Bank Ltd</a>
                    </td>
                    <td>
                        <a href="https://www.primebank.com.bd/" class="" target="_blank">https://www.primebank.com.bd/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.pubalibangla.com" class="" target="_blank">Pubali Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.pubalibangla.com" class="" target="_blank">http://www.pubalibangla.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.rakub.org.bd" class="" target="_blank">Rajshahi Krishi Unnayan Bank</a>
                    </td>
                    <td>
                        <a href="http://www.rakub.org.bd" class="" target="_blank">http://www.rakub.org.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.rupali-bank.com" class="" target="_blank">Rupali Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.rupali-bank.com" class="" target="_blank">http://www.rupali-bank.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.shahjalalbank.com.bd" class="" target="_blank">Shahjalal Islami Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.shahjalalbank.com.bd" class="" target="_blank">http://www.shahjalalbank.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.siblbd.com" class="" target="_blank">Social Islami Bank Ltd.</a>
                    </td>
                    <td>
                        <a href="http://www.siblbd.com" class="" target="_blank">http://www.siblbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.sonalibank.com.bd" class="" target="_blank">Sonali Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.sonalibank.com.bd" class="" target="_blank">http://www.sonalibank.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.sbacbank.com/" class="" target="_blank">South Bangla Agriculture &amp; Commerce Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.sbacbank.com/" class="" target="_blank">http://www.sbacbank.com/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.sebankbd.com" class="" target="_blank">Southeast Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.sebankbd.com" class="" target="_blank">http://www.sebankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.standardbankbd.com" class="" target="_blank">Standard Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.standardbankbd.com" class="" target="_blank">http://www.standardbankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.standardchartered.com/bd" class="" target="_blank">Standard Chartered Bank</a>
                    </td>
                    <td>
                        <a href="http://www.standardchartered.com/bd" class="" target="_blank">http://www.standardchartered.com/bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.statebankofindia.com" class="" target="_blank">State Bank of India</a>
                    </td>
                    <td>
                        <a href="http://www.statebankofindia.com" class="" target="_blank">http://www.statebankofindia.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.thecitybank.com" class="" target="_blank">The City Bank Ltd.</a>
                    </td>
                    <td>
                        <a href="http://www.thecitybank.com" class="" target="_blank">http://www.thecitybank.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.farmersbankbd.com" class="" target="_blank">The Farmers Bank Ltd</a>
                    </td>
                    <td>
                        <a href="http://www.farmersbankbd.com" class="" target="_blank">http://www.farmersbankbd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.hsbc.com.bd" class="" target="_blank">The Hong Kong and Shanghai Banking Corporation. Ltd.</a>
                    </td>
                    <td>
                        <a href="http://www.hsbc.com.bd" class="" target="_blank">http://www.hsbc.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.trustbank.com.bd" class="" target="_blank">Trust Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.trustbank.com.bd" class="" target="_blank">http://www.trustbank.com.bd</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.unionbank.com.bd/" class="" target="_blank">Union Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.unionbank.com.bd/" class="" target="_blank">http://www.unionbank.com.bd/</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.ucbl.com" class="" target="_blank">United Commercial Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.ucbl.com" class="" target="_blank">http://www.ucbl.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.uttarabank-bd.com" class="" target="_blank">Uttara Bank Limited</a>
                    </td>
                    <td>
                        <a href="http://www.uttarabank-bd.com" class="" target="_blank">http://www.uttarabank-bd.com</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://www.wooribank.com" class="" target="_blank">Woori Bank</a>
                    </td>
                    <td>
                        <a href="http://www.wooribank.com" class="" target="_blank">http://www.wooribank.com</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </p>

</div>

<div id="tab3" class="tabcontent">
    <h3>Financial Institution</h3>
    <p>
    <table class="table table-responsive-sm table-bordered table-striped">
        <tbody>
            <tr>
                <th class="table-danger">Organisation</th>
                <th class="table-danger">Web Link</th>
            </tr>
            <tr>
                <td>Agrani SME Financing Company Limited</td>
                <td></td>
            </tr>
            <tr>
                <td>Bangladesh Finance &amp; Investment Co. Ltd.</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.bifcol.com" class="" target="_blank">Bangladesh Industrial Finance Company Limited (BIFC)</a>
                </td>
                <td>
                    <a href="http://www.bifcol.com" class="" target="_blank">http://www.bifcol.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.biffl.org.bd/" class="" target="_blank">Bangladesh Infrastructure Finance Fund Limited</a>
                </td>
                <td>
                    <a href="http://www.biffl.org.bd/" class="" target="_blank">http://www.biffl.org.bd/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.blilbd.com" class="" target="_blank">Bay Leasing &amp; Investment Limited</a>
                </td>
                <td>
                    <a href="http://www.blilbd.com" class="" target="_blank">http://www.blilbd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.deltabrac.com" class="" target="_blank">Delta Brac Housing Finance Corporation Ltd. (DBH)</a>
                </td>
                <td>
                    <a href="http://www.deltabrac.com" class="" target="_blank">http://www.deltabrac.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.ffilbd.com" class="" target="_blank">Fareast Finance &amp; Investment Limited</a>
                </td>
                <td>
                    <a href="http://www.ffilbd.com" class="" target="_blank">http://www.ffilbd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.fasbd.com" class="" target="_blank">FAS Finance &amp; Investment Limited</a>
                </td>
                <td>
                    <a href="http://www.fasbd.com" class="" target="_blank">http://www.fasbd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.first-lease.com" class="" target="_blank">First Finance Limited</a>
                </td>
                <td>
                    <a href="http://www.first-lease.com" class="" target="_blank">http://www.first-lease.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.gspfinanceco.com" class="" target="_blank">GSP Finance Company (Bangladesh) Limited (GSPB)</a>
                </td>
                <td>
                    <a href="http://www.gspfinanceco.com" class="" target="_blank">http://www.gspfinanceco.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.hajjfinance.net" class="" target="_blank">Hajj Finance Company Limited</a>
                </td>
                <td>
                    <a href="http://www.hajjfinance.net" class="" target="_blank">http://www.hajjfinance.net</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.idlc.com" class="" target="_blank">IDLC Finance Limited</a>
                </td>
                <td>
                    <a href="http://www.idlc.com" class="" target="_blank">http://www.idlc.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.iidfc.com" class="" target="_blank">Industrial and Infrastructure Development Finance Company (IIDFC) Limited</a>
                </td>
                <td>
                    <a href="http://www.iidfc.com" class="" target="_blank">http://www.iidfc.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.ipdcbd.com" class="" target="_blank">Industrial Promotion and Development Company of Bangladesh Limited(IPDC)</a>
                </td>
                <td>
                    <a href="http://www.ipdcbd.com" class="" target="_blank">http://www.ipdcbd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.idcol.org" class="" target="_blank">Infrastructure Development Company Limited (IDCOL)</a>
                </td>
                <td>
                    <a href="http://www.idcol.org" class="" target="_blank">http://www.idcol.org</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.ilfsl.com" class="" target="_blank">International Leasing and Financial Services Limited </a>
                </td>
                <td>
                    <a href="http://www.ilfsl.com" class="" target="_blank">http://www.ilfsl.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.ifilbd.com" class="" target="_blank">Islamic Finance and Investment Limited</a>
                </td>
                <td>
                    <a href="http://www.ifilbd.com" class="" target="_blank">http://www.ifilbd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.lankabangla.com" class="" target="_blank">LankaBangla Finance Ltd.</a>
                </td>
                <td>
                    <a href="http://www.lankabangla.com" class="" target="_blank">http://www.lankabangla.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.midasfl.com" class="" target="_blank">MIDAS Financing Ltd. (MFL)</a>
                </td>
                <td>
                    <a href="http://www.midasfl.com" class="" target="_blank">http://www.midasfl.com</a>
                </td>
            </tr>
            <tr>
                <td>National Finance Ltd</td>
                <td></td>
            </tr>
            <tr>
                <td>National Housing Finance and Investments Limited</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.nationalhousingbd.com/" class="" target="_blank">National Housing Finance And Investments Limited</a>
                </td>
                <td>
                    <a href="http://www.nationalhousingbd.com/" class="" target="_blank">http://www.nationalhousingbd.com/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.plfsbd.com" class="" target="_blank">People's Leasing and Financial Services Ltd</a>
                </td>
                <td>
                    <a href="http://www.plfsbd.com" class="" target="_blank">http://www.plfsbd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.phoenixleasing.com.bd" class="" target="_blank">Phoenix Finance and Investments Limited</a>
                </td>
                <td>
                    <a href="http://www.phoenixleasing.com.bd" class="" target="_blank">http://www.phoenixleasing.com.bd</a>
                </td>
            </tr>
            <tr>
                <td>Premier Leasing &amp; Finance Limited</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.primefinancebd.com" class="" target="_blank">Prime Finance &amp; Investment Ltd</a>
                </td>
                <td>
                    <a href="http://www.primefinancebd.com" class="" target="_blank">http://www.primefinancebd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.reflbd.com" class="" target="_blank">Reliance Finance Limited</a>
                </td>
                <td>
                    <a href="http://www.reflbd.com" class="" target="_blank">http://www.reflbd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.sabinco.com.bd" class="" target="_blank">Saudi-Bangladesh Industrial &amp; Agricultural Investment Company Limited (SABINCO)</a>
                </td>
                <td>
                    <a href="http://www.sabinco.com.bd" class="" target="_blank">http://www.sabinco.com.bd</a>
                </td>
            </tr>
            <tr>
                <td>The UAE-Bangladesh Investment Co. Ltd</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.unicap-bd.com" class="" target="_blank">Union Capital Limited</a>
                </td>
                <td>
                    <a href="http://www.unicap-bd.com" class="" target="_blank">http://www.unicap-bd.com</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.ulc.com.bd" class="" target="_blank">United Finance Limited</a>
                </td>
                <td>
                    <a href="http://www.ulc.com.bd" class="" target="_blank">http://www.ulc.com.bd</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.uttarafinance.biz" class="" target="_blank">Uttara Finance and Investments Limited</a>
                </td>
                <td>
                    <a href="http://www.uttarafinance.biz" class="" target="_blank">http://www.uttarafinance.biz</a>
                </td>
            </tr>
        </tbody>
    </table>
</p>

</div>

<div id="tab4" class="tabcontent">
    <h3>Micro Finance Institution</h3>
    <p>
    <table class="table table-responsive-sm table-bordered table-striped">
        <tbody>
            <tr>
                <th class="table-danger">Organisation</th>
                <th class="table-danger">Web Link</th>
            </tr>
            <tr>
                <td>
                    <a href="http://www.asa.org.bd" class="" target="_blank">ASA</a>
                </td>
                <td>
                    <a href="http://www.asa.org.bd" class="" target="_blank">http://www.asa.org.bd</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.brac.net/" class="" target="_blank">Brac</a>
                </td>
                <td>
                    <a href="http://www.brac.net/" class="" target="_blank">http://www.brac.net/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.burobd.org/" class="" target="_blank">BURO Bangladesh</a>
                </td>
                <td>
                    <a href="http://www.burobd.org/" class="" target="_blank">http://www.burobd.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.grameen-info.org/" class="" target="_blank">Grameen Bank</a>
                </td>
                <td>
                    <a href="http://www.grameen-info.org/" class="" target="_blank">http://www.grameen-info.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.jcfbd.org/" class="" target="_blank">Jagorani Chakra Foundation (JCF)</a>
                </td>
                <td>
                    <a href="http://www.jcfbd.org/" class="" target="_blank">http://www.jcfbd.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.sfdw.org" class="" target="_blank">Shakti Foundation for Disadvantaged Women</a>
                </td>
                <td>
                    <a href="http://www.sfdw.org" class="" target="_blank">http://www.sfdw.org</a>
                </td>
            </tr>
        </tbody>
    </table>
</p>

</div>

<div id="tab5" class="tabcontent" >
    <h3>National & International Institution</h3>
    <p>
    <table class="table table-responsive-sm table-bordered table-striped">
        <tbody>
            <tr>
                <th class="table-danger">Organisation</th>
                <th class="table-danger">Web Link</th>
            </tr>
            <tr>
                <td>
                    <a href="http://www.bids-bd.org" class="" target="_blank">BIDS Bangladesh</a>
                </td>
                <td>
                    <a href="http://www.bids-bd.org" class="" target="_blank">http://www.bids-bd.org</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.cpd-bangladesh.org" class="" target="_blank">Centre for Policy Dialogue (CPD)</a>
                </td>
                <td>
                    <a href="http://www.cpd-bangladesh.org" class="" target="_blank">http://www.cpd-bangladesh.org</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.bangladeshinc.com/" class="" target="_blank">Local Enterprise Investment Centre (LEIC)</a>
                </td>
                <td>
                    <a href="http://www.bangladeshinc.com/" class="" target="_blank">http://www.bangladeshinc.com/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.pksf-bd.org/index.html" class="" target="_blank">Palli Karma-Sahayak Foundation (PKSF) </a>
                </td>
                <td>
                    <a href="http://www.pksf-bd.org/index.html" class="" target="_blank">http://www.pksf-bd.org/index.html</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.saarctrade.info" class="" target="_blank">SAARC Trade Portal</a>
                </td>
                <td>
                    <a href="http://www.saarctrade.info" class="" target="_blank">http://www.saarctrade.info</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.asianclearingunion.org/" class="" target="_blank">Asian Clearing Union (ACU)</a>
                </td>
                <td>
                    <a href="http://www.asianclearingunion.org/" class="" target="_blank">http://www.asianclearingunion.org/</a>
                </td>
            </tr>
            <tr>
                <th class="table-danger">International</th>
            </tr>
            <tr>
                <td>
                    <a href="http://www.adb.org/" class="" target="_blank">Asian Development Bank (ADB)</a>
                </td>
                <td>
                    <a href="http://www.adb.org/" class="" target="_blank">http://www.adb.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.bis.org/" class="" target="_blank">Bank for International Settlements (BIS)</a>
                </td>
                <td>
                    <a href="http://www.bis.org/" class="" target="_blank">http://www.bis.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.care.org/" class="" target="_blank">CARE</a>
                </td>
                <td>
                    <a href="http://www.care.org/" class="" target="_blank">http://www.care.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.cirdap.org.sg/" class="" target="_blank">Centre on Integrated Rural Development for Asia and the Pacific (CIRDAP)</a>
                </td>
                <td>
                    <a href="http://www.cirdap.org.sg/" class="" target="_blank">http://www.cirdap.org.sg/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.fao.org/" class="" target="_blank">Food and Agriculture Organization (FAO) of the United Nations</a>
                </td>
                <td>
                    <a href="http://www.fao.org/" class="" target="_blank">http://www.fao.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.icddrb.org/" class="" target="_blank">ICDDR,B</a>
                </td>
                <td>
                    <a href="http://www.icddrb.org/" class="" target="_blank">http://www.icddrb.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.ifrc.org/" class="" target="_blank">International Federation of Red Cross and Red Crescent Societies (IFRC)</a>
                </td>
                <td>
                    <a href="http://www.ifrc.org/" class="" target="_blank">http://www.ifrc.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.ilo.org/" class="" target="_blank">International Labour Organization (ILO)</a>
                </td>
                <td>
                    <a href="http://www.ilo.org/" class="" target="_blank">http://www.ilo.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.imf.org/" class="" target="_blank">International Monetary Fund (IMF)</a>
                </td>
                <td>
                    <a href="http://www.imf.org/" class="" target="_blank">http://www.imf.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.oxfam.org/" class="" target="_blank">Oxfam International</a>
                </td>
                <td>
                    <a href="http://www.oxfam.org/" class="" target="_blank">http://www.oxfam.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://asiafoundation.org/" class="" target="_blank">The Asia Foundation</a>
                </td>
                <td>
                    <a href="http://asiafoundation.org/" class="" target="_blank">http://asiafoundation.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.britishcouncil.org/" class="" target="_blank">The British Council</a>
                </td>
                <td>
                    <a href="http://www.britishcouncil.org/" class="" target="_blank">http://www.britishcouncil.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.undp.org/" class="" target="_blank">United Nations Development Programme (UNDP)</a>
                </td>
                <td>
                    <a href="http://www.undp.org/" class="" target="_blank">http://www.undp.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.unesco.org/" class="" target="_blank">United Nations Educational, Scientific and Cultural Organization (UNESCO)</a>
                </td>
                <td>
                    <a href="http://www.unesco.org/" class="" target="_blank">http://www.unesco.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.unhcr.org/" class="" target="_blank">United Nations High Commissioner for Refugees (UNHCR)</a>
                </td>
                <td>
                    <a href="http://www.unhcr.org/" class="" target="_blank">http://www.unhcr.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.unfpa.org/" class="" target="_blank">United Nations Population Fund</a>
                </td>
                <td>
                    <a href="http://www.unfpa.org/" class="" target="_blank">http://www.unfpa.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.usaid.gov/" class="" target="_blank">United States Agency International Development (USAID)</a>
                </td>
                <td>
                    <a href="http://www.usaid.gov/" class="" target="_blank">http://www.usaid.gov/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.worldbank.org/" class="" target="_blank">World Bank (WB)</a>
                </td>
                <td>
                    <a href="http://www.worldbank.org/" class="" target="_blank">http://www.worldbank.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.wfp.org/" class="" target="_blank">World Food Programme (WFP)</a>
                </td>
                <td>
                    <a href="http://www.wfp.org/" class="" target="_blank">http://www.wfp.org/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.who.int/" class="" target="_blank">World Health Organization World Health Organization</a>
                </td>
                <td>
                    <a href="http://www.who.int/" class="" target="_blank">http://www.who.int/</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="http://www.wto.org/" class="" target="_blank">World Trade Organization (WTO)</a>
                </td>
                <td>
                    <a href="http://www.wto.org/" class="" target="_blank">http://www.wto.org/</a>
                </td>
            </tr>
        </tbody>
    </table>
</p>
</div>

<div id="tab6" class="tabcontent">
    <h3>Money Changers</h3>
    <p>
        <a href="
           <?php echo base_url(); ?>assets/file/moneychangers.pdf">Download Money Changers </a>
        </br>
        </br>
        </br>
        <a href="http://www.bis.org" target="_blank">GO to Central Banks</a>
    </p>
</div>

<div id="tab7" class="tabcontent">
    <h3>Credit Rating</h3>
    <p>
    <table class="table table-responsive-sm table-bordered table-striped">
        <tbody>
            <tr>
                <th class="table-danger">S.L</th>
                <th class="table-danger">Name of ECAIs</th>
                <th class="table-danger">BB Recognition Date</th>
                <th class="table-danger">BSEC License Date</th>
                <th class="table-danger">Web Address</th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <a href="http://www.crislbd.com/" class="" target="_blank">Credit Rating Information and Services Ltd (CRISL)</a>
                </td>
                <td>29 April, 2009</td>
                <td>21 August, 2002</td>
                <td>
                    <a href="http://www.crislbd.com/" class="" target="_blank">http://www.crislbd.com/</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>
                    <a href="http://crab.com.bd/" class="" target="_blank">Credit Rating Agency of Bangladesh Ltd(CRAB)</a>
                </td>
                <td>29 April, 2010</td>
                <td>24 February, 2004</td>
                <td>
                    <a href="http://crab.com.bd/" class="" target="_blank">http://crab.com.bd/</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>
                    <a href="http://www.emergingrating.com/" class="" target="_blank">Emerging Credit Rating Ltd (ECRL)</a>
                </td>
                <td>05 July, 2010</td>
                <td>22 June, 2010</td>
                <td>
                    <a href="http://www.emergingrating.com/" class="" target="_blank">http://www.emergingrating.com/</a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>
                    <a href="http://www.ncrbd.com/" class="" target="_blank">National Credit Ratings Ltd (NCRL)</a>
                </td>
                <td>19 July, 2010</td>
                <td>22 June, 2010</td>
                <td>
                    <a href="http://www.ncrbd.com/" class="" target="_blank">http://www.ncrbd.com/</a>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>
                    <a href="http://www.acrslbd.com/" class="" target="_blank">ARGUS Credit Rating Services Ltd (ACRSL)</a>
                </td>
                <td>15 November, 2011</td>
                <td>21 July, 2011</td>
                <td>
                    <a href="http://www.acrslbd.com/" class="" target="_blank">http://www.acrslbd.com/</a>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>
                    <a href="http://www.alpharating.com.bd/" class="" target="_blank">Alpha Credit Rating Ltd (ACRL) </a>
                </td>
                <td>12 July, 2012</td>
                <td>20 February, 2012</td>
                <td>
                    <a href="http://www.alpharating.com.bd/" class="" target="_blank">http://www.alpharating.com.bd/</a>
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td>
                    <a href="http://www.wasocreditrating.com/" class="" target="_blank">WASO Credit Rating Company (BD)Ltd.(WASO)</a>
                </td>
                <td>17 October, 2012</td>
                <td>15 February, 2012</td>
                <td>
                    <a href="http://www.wasocreditrating.com/" class="" target="_blank">http://www.wasocreditrating.com/</a>
                </td>
            </tr>
            <tr>
                <td>8</td>
                <td>
                    <a href="http://www.bdral.com/" class="" target="_blank">The Bangladesh Rating Agency Limited(BDRAL) (For SME Rating only) </a>
                </td>
                <td>13 October, 2013</td>
                <td>07 March, 2012</td>
                <td>
                    <a href="http://www.bdral.com/" class="" target="_blank">http://www.bdral.com/</a>
                </td>
            </tr>
        </tbody>
    </table>
</p>
</div>

<script>
    function openTab(evt, tabName) {
        var i, tabcontent, navlink;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        navlink = document.getElementsByClassName("nav-link");
        for (i = 0; i < navlink.length; i++) {
            navlink[i].className = navlink[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>
</html>