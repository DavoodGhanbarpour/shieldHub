@extends('admin.layout.main')

@section('title', 'Users')

@section('actions')
  <div class="col-auto ms-auto d-print-none">
    <div class="btn-list">
      <a href="{{ route('admin.userAdd') }}" class="btn btn-primary d-none d-sm-inline-block">
        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
        New User
      </a>
    </div>
  </div>
@endsection

@section('content')

  <div class="card">
    <div class="card-body">
      <div id="table-default" class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th><button class="table-sort" data-sort="sort-name">Name</button></th>
              <th><button class="table-sort" data-sort="sort-city">City</button></th>
              <th><button class="table-sort" data-sort="sort-type">Type</button></th>
              <th><button class="table-sort" data-sort="sort-score">Score</button></th>
              <th><button class="table-sort" data-sort="sort-date">Date</button></th>
              <th><button class="table-sort" data-sort="sort-quantity">Quantity</button></th>
              <th><button class="table-sort" data-sort="sort-progress">Progress</button></th>
            </tr>
          </thead>
          <tbody class="table-tbody">
            <tr>
              <td class="sort-name">Steel Vengeance</td>
              <td class="sort-city">Cedar Point, United States</td>
              <td class="sort-type">RMC Hybrid</td>
              <td class="sort-score">100,0%</td>
              <td class="sort-date" data-date="1628071164">August 04, 2021</td>
              <td class="sort-quantity">74</td>
              <td class="sort-progress" data-progress="30">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">30%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 30%" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" aria-label="30% Complete">
                        <span class="visually-hidden">30% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Fury 325</td>
              <td class="sort-city">Carowinds, United States</td>
              <td class="sort-type">B&M Giga, Hyper, Steel</td>
              <td class="sort-score">99,3%</td>
              <td class="sort-date" data-date="1546512137">January 03, 2019</td>
              <td class="sort-quantity">49</td>
              <td class="sort-progress" data-progress="48">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">48%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 48%" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" aria-label="48% Complete">
                        <span class="visually-hidden">48% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Wicked Cyclone</td>
              <td class="sort-city">Six Flags New England, United States</td>
              <td class="sort-type">RMC Hybrid</td>
              <td class="sort-score">98,2%</td>
              <td class="sort-date" data-date="1568819813">September 18, 2019</td>
              <td class="sort-quantity">174</td>
              <td class="sort-progress" data-progress="3">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">3%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 3%" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100" aria-label="3% Complete">
                        <span class="visually-hidden">3% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Shambhala</td>
              <td class="sort-city">Port Aventura, Spain</td>
              <td class="sort-type">B&M Hyper, Steel</td>
              <td class="sort-score">98,2%</td>
              <td class="sort-date" data-date="1538221867">September 29, 2018</td>
              <td class="sort-quantity">111</td>
              <td class="sort-progress" data-progress="24">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">24%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 24%" role="progressbar" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100" aria-label="24% Complete">
                        <span class="visually-hidden">24% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Taron</td>
              <td class="sort-city">Phantasialand, Germany</td>
              <td class="sort-type">Intamin Sit Down, Steel</td>
              <td class="sort-score">98,2%</td>
              <td class="sort-date" data-date="1592858850">June 22, 2020</td>
              <td class="sort-quantity">130</td>
              <td class="sort-progress" data-progress="48">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">48%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 48%" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" aria-label="48% Complete">
                        <span class="visually-hidden">48% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Expedition Ge Force</td>
              <td class="sort-city">Holiday Park, Germany</td>
              <td class="sort-type">Intamin Megacoaster, Steel</td>
              <td class="sort-score">98,2%</td>
              <td class="sort-date" data-date="1565107347">August 06, 2019</td>
              <td class="sort-quantity">157</td>
              <td class="sort-progress" data-progress="57">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">57%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 57%" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" aria-label="57% Complete">
                        <span class="visually-hidden">57% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Storm Chaser</td>
              <td class="sort-city">Kentucky Kingdom, United States</td>
              <td class="sort-type">RMC Steel</td>
              <td class="sort-score">97,9%</td>
              <td class="sort-date" data-date="1564805623">August 03, 2019</td>
              <td class="sort-quantity">43</td>
              <td class="sort-progress" data-progress="42">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">42%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 42%" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" aria-label="42% Complete">
                        <span class="visually-hidden">42% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Helix</td>
              <td class="sort-city">Liseberg, Sweden</td>
              <td class="sort-type">Mack Looper, Steel, Terrain</td>
              <td class="sort-score">97,9%</td>
              <td class="sort-date" data-date="1633500491">October 06, 2021</td>
              <td class="sort-quantity">151</td>
              <td class="sort-progress" data-progress="54">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">54%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 54%" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" aria-label="54% Complete">
                        <span class="visually-hidden">54% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td class="sort-name">Outlaw Run</td>
              <td class="sort-city">Silver Dollar City, United States</td>
              <td class="sort-type">RMC Hybrid</td>
              <td class="sort-score">96,6%</td>
              <td class="sort-date" data-date="1547084027">January 10, 2019</td>
              <td class="sort-quantity">131</td>
              <td class="sort-progress" data-progress="64">
                <div class="row align-items-center">
                  <div class="col-12 col-lg-auto">64%</div>
                  <div class="col">
                    <div class="progress" style="width: 5rem">
                      <div class="progress-bar" style="width: 64%" role="progressbar" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100" aria-label="64% Complete">
                        <span class="visually-hidden">64% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection