  <!-- Logo -->
  @include('includes.links')
  <div class="app-brand justify-content-center">
      <svg viewBox="0 0 200 50" xmlns="http://www.w3.org/2000/svg">
          <defs>
              <!-- Basket path -->
              <path d="M8 15 L6 28 Q6 30 8 30 L22 30 Q24 30 24 28 L26 15 Z" id="basket-body">
              </path>

              <!-- Speed bolt -->
              <path d="M35 10 L30 20 L33 20 L28 30" id="speed-bolt"></path>
          </defs>

          <g id="logo-icon">
              <!-- Main basket -->
              <g id="basket-group" transform="translate(0, 0)">
                  <mask id="mask-basket" fill="white">
                      <use xlink:href="#basket-body"></use>
                  </mask>
                  <use fill="#10B981" xlink:href="#basket-body"></use>

                  <!-- Basket weave detail -->
                  <g id="weave" mask="url(#mask-basket)">
                      <line x1="10" y1="17" x2="9" y2="28" stroke="#059669"
                          stroke-width="1.5" />
                      <line x1="16" y1="16" x2="15" y2="28" stroke="#059669"
                          stroke-width="1.5" />
                      <line x1="22" y1="17" x2="21" y2="28" stroke="#059669"
                          stroke-width="1.5" />
                      <use fill="#10B981" xlink:href="#basket-body"></use>
                      <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#basket-body"></use>
                  </g>

                  <!-- Items in basket -->
                  <g id="items" mask="url(#mask-basket)">
                      <circle cx="12" cy="20" r="2.5" fill="#EF4444" opacity="0.9" />
                      <circle cx="19" cy="19" r="2.8" fill="#3B82F6" opacity="0.9" />
                      <rect x="14" y="23" width="4" height="3" rx="0.5" fill="#F59E0B" opacity="0.9" />
                      <use fill-opacity="0.15" fill="#000000" xlink:href="#basket-body"></use>
                  </g>
              </g>

              <!-- Handle -->
              <path d="M 10 15 Q 8 10 12 10" fill="none" stroke="#10B981" stroke-width="2.5"
                  stroke-linecap="round" />
              <path d="M 22 15 Q 24 10 20 10" fill="none" stroke="#10B981" stroke-width="2.5"
                  stroke-linecap="round" />

              <!-- Speed indicator -->
              <g id="speed-icon" transform="translate(0, 0)">
                  <use fill="none" stroke="#F59E0B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                      xlink:href="#speed-bolt">
                  </use>
                  <use fill-opacity="0.3" fill="#F59E0B" xlink:href="#speed-bolt"></use>
              </g>
          </g>

          <!-- Text -->
          <text x="48" y="28" font-family="Arial, sans-serif" font-size="20" font-weight="bold"
              fill="#1F2937">Quick</text>
          <text x="106" y="28" font-family="Arial, sans-serif" font-size="20" font-weight="bold"
              fill="#10B981">Basket</text>
      </svg>
  </div>
  <!-- /Logo -->
