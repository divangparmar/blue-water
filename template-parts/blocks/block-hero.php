<?php
/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 */

$hero_subtitle = get_field('hero_subtitle') ?: "Australia's #1 Water Trading Platform";
$hero_title = get_field('hero_title') ?: "Trade Water <br />Anywhere, Anytime.";
$hero_description = get_field('hero_description') ?: "With True Blue, you get the best of both worlds – the personalized service of an experienced<br> broker and the freedom to trade online anytime, anywhere.";
$hero_button = get_field('hero_button');
$hero_background_image = get_field('hero_background_image');

$bg_style = '';
if ($hero_background_image) {
   ?>
   <style>
      .banner-section {
         background: url("<?php echo esc_url($hero_background_image['url']); ?>");
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
      }
   </style>
   <?php
}
?>


<!-- Banner Start -->
<section class="banner-section" id="<?php echo esc_attr($block['id']); ?>">
   <div class="banner-bg">
      <div class="container">
         <div class="row">
            <div class="col-5">
               <div class="banner-title">
                  <h6><?php echo esc_html($hero_subtitle); ?></h6>
                  <h1><?php echo wp_kses_post($hero_title); ?></h1>
                  <p><?php echo wp_kses_post($hero_description); ?></p>
                  <?php if ($hero_button): ?>
                     <div class="banner-bttn bttn">
                        <a href="<?php echo esc_url($hero_button['url']); ?>"
                           target="<?php echo esc_attr($hero_button['target'] ? $hero_button['target'] : '_self'); ?>"
                           class="btn-1"><?php echo esc_html($hero_button['title']); ?></a>
                     </div>
                  <?php endif; ?>
               </div>
            </div>
            <div class="col-7">
               <div class="tbl_slid_wrapper">
                  <div class="tbl_slid_carousel owl-carousel">
                     <div class="tbl_slid_item">
                        <section style="">
                           <div style="max-width:100%; margin: 0 auto;" bis_skin_checked="1">
                              <div style="text-align:center; margin-bottom: 40px;" bis_skin_checked="1">
                                 <h2 style="color:#fff; font-size: 2rem; font-weight: 700; margin-bottom: 10px;">Live
                                    Temporary Water Prices</h2>
                                 <p style="color:rgba(255,255,255,0.8); font-size: 1rem;">Real-time market data —
                                    updated daily</p>
                              </div>
                              <div
                                 style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.15); border-radius:20px; padding:32px; overflow-x:auto;"
                                 bis_skin_checked="1">
                                 <div
                                    style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; flex-wrap:wrap; gap:10px;"
                                    bis_skin_checked="1">
                                    <span style="color:#fff; font-weight:700; font-size:18px;">Temporary Allocation
                                       Market</span>
                                    <div style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;"
                                       bis_skin_checked="1">
                                       <span id="tbwe-price-updated"
                                          style="color:rgba(255,255,255,0.45); font-size:12px;">Updated 7 Apr, 3:07 pm
                                          AEST</span>
                                       <span
                                          style="display:inline-flex; align-items:center; gap:6px; background:rgba(0,200,100,0.12); border:1px solid rgba(0,200,100,0.3); border-radius:50px; padding:5px 14px;">
                                          <span
                                             style="width:8px; height:8px; background:#00c864; border-radius:50%; display:inline-block; animation: tbwePulse 2s infinite;"></span>
                                          <span
                                             style="color:#00c864; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px;">Live</span>
                                       </span>
                                    </div>
                                 </div>
                                 <table
                                    style="width:100%; border-collapse:collapse; min-width:400px; text-align: left; ">
                                    <thead>
                                       <tr>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             Zone</th>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             State</th>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             Price/ML</th>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             Alloc %</th>
                                       </tr>
                                    </thead>
                                    <tbody id="tbwe-price-body">
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             VIC Murray Z6 (Above Choke)</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(59,130,246,0.2);color:#93c5fd;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">VIC</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $280</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             100%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             VIC Murray Z7 (Below Choke)</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(59,130,246,0.2);color:#93c5fd;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">VIC</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $500</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             100%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             VIC Goulburn</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(59,130,246,0.2);color:#93c5fd;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">VIC</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $295</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             81%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             NSW Murray Z10</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(34,197,94,0.2);color:#86efac;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">NSW</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $272</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             97%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             NSW Murray Z11</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(34,197,94,0.2);color:#86efac;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">NSW</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $415</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             97%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             NSW Murrumbidgee</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(34,197,94,0.2);color:#86efac;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">NSW</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $420</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             95%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             SA Murray Z12</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(251,191,36,0.2);color:#fcd34d;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">SA</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $440</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             100%</td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <div
                                    style="margin-top:20px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.08);"
                                    bis_skin_checked="1">
                                    <p style="color:rgba(255,255,255,0.35); font-size:11px; margin:0;">Indicative
                                       pricing only. Contact a TBWE broker for live quotes. Prices update daily.</p>
                                 </div>
                              </div>
                              <div style="text-align:center; margin-top:32px;" bis_skin_checked="1">
                                 <a href="https://water-wizard-tbwe.vercel.app"
                                    style="display:inline-block; background:#007AFF; color:#fff; padding:14px 32px; border-radius:12px; text-decoration:none; font-size:15px; font-weight:600;">Get
                                    Your Free Water Plan →</a>
                              </div>
                           </div>
                        </section>
                     </div>
                     <div class="tbl_slid_item">
                        <section style="">
                           <div style="max-width:100%; margin: 0 auto;" bis_skin_checked="1">
                              <div style="text-align:center; margin-bottom: 40px;" bis_skin_checked="1">
                                 <h2 style="color:#fff; font-size: 2rem; font-weight: 700; margin-bottom: 10px;">Live
                                    Temporary Water Prices</h2>
                                 <p style="color:rgba(255,255,255,0.8); font-size: 1rem;">Real-time market data —
                                    updated daily</p>
                              </div>
                              <div
                                 style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.15); border-radius:20px; padding:32px; overflow-x:auto;"
                                 bis_skin_checked="1">
                                 <div
                                    style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; flex-wrap:wrap; gap:10px;"
                                    bis_skin_checked="1">
                                    <span style="color:#fff; font-weight:700; font-size:18px;">Temporary Allocation
                                       Market</span>
                                    <div style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;"
                                       bis_skin_checked="1">
                                       <span id="tbwe-price-updated"
                                          style="color:rgba(255,255,255,0.45); font-size:12px;">Updated 7 Apr, 3:07 pm
                                          AEST</span>
                                       <span
                                          style="display:inline-flex; align-items:center; gap:6px; background:rgba(0,200,100,0.12); border:1px solid rgba(0,200,100,0.3); border-radius:50px; padding:5px 14px;">
                                          <span
                                             style="width:8px; height:8px; background:#00c864; border-radius:50%; display:inline-block; animation: tbwePulse 2s infinite;"></span>
                                          <span
                                             style="color:#00c864; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px;">Live</span>
                                       </span>
                                    </div>
                                 </div>
                                 <table
                                    style="width:100%; border-collapse:collapse; min-width:400px; text-align: left; ">
                                    <thead>
                                       <tr>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             Zone</th>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             State</th>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             Price/ML</th>
                                          <th
                                             style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                             Alloc %</th>
                                       </tr>
                                    </thead>
                                    <tbody id="tbwe-price-body">
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             VIC Murray Z6 (Above Choke)</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(59,130,246,0.2);color:#93c5fd;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">VIC</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $280</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             100%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             VIC Murray Z7 (Below Choke)</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(59,130,246,0.2);color:#93c5fd;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">VIC</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $500</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             100%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             VIC Goulburn</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(59,130,246,0.2);color:#93c5fd;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">VIC</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $295</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             81%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             NSW Murray Z10</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(34,197,94,0.2);color:#86efac;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">NSW</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $272</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             97%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             NSW Murray Z11</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(34,197,94,0.2);color:#86efac;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">NSW</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $415</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             97%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             NSW Murrumbidgee</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(34,197,94,0.2);color:#86efac;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">NSW</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $420</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             95%</td>
                                       </tr>
                                       <tr>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                             SA Murray Z12</td>
                                          <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                             <span
                                                style="background:rgba(251,191,36,0.2);color:#fcd34d;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;">SA</span>
                                          </td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                             $440</td>
                                          <td
                                             style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                             100%</td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <div
                                    style="margin-top:20px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.08);"
                                    bis_skin_checked="1">
                                    <p style="color:rgba(255,255,255,0.35); font-size:11px; margin:0;">Indicative
                                       pricing only. Contact a TBWE broker for live quotes. Prices update daily.</p>
                                 </div>
                              </div>
                              <div style="text-align:center; margin-top:32px;" bis_skin_checked="1">
                                 <a href="https://water-wizard-tbwe.vercel.app"
                                    style="display:inline-block; background:#007AFF; color:#fff; padding:14px 32px; border-radius:12px; text-decoration:none; font-size:15px; font-weight:600;">Get
                                    Your Free Water Plan →</a>
                              </div>
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
               <!-- jQuery -->
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Banner End -->