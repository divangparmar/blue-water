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

// API Endpoints from ACF
$temp_api = get_field('temp_api');
$perm_api = get_field('per_api_endpoint');
$api_endpoint_temp = $temp_api['api_endpoint_temp'] ? $temp_api['api_endpoint_temp'] : 'https://water-wizard-tbwe.vercel.app/api/waterflow';
$api_endpoint_perm = $perm_api['api_endpoint_perm'] ? $perm_api['api_endpoint_perm'] : 'https://water-wizard-tbwe.vercel.app/api/permanent-prices';

// Transient Fetch for Temporary Prices
$transient_name_temp = 'tbwe_temp_prices_v1';
$data_temp = get_transient($transient_name_temp);
if (false === $data_temp) {
   $response = wp_remote_get($api_endpoint_temp, ['timeout' => 15]);
   if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
      $data_temp = json_decode(wp_remote_retrieve_body($response), true);
      set_transient($transient_name_temp, $data_temp, HOUR_IN_SECONDS * 6);
   } else {
      $data_temp = [];
   }
}

// Transient Fetch for Permanent Prices
$transient_name_perm = 'tbwe_perm_prices_v1';
$data_perm = get_transient($transient_name_perm);
if (false === $data_perm) {
   $response = wp_remote_get($api_endpoint_perm, ['timeout' => 15]);
   if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
      $data_perm = json_decode(wp_remote_retrieve_body($response), true);
      set_transient($transient_name_perm, $data_perm, HOUR_IN_SECONDS * 6);
   } else {
      $data_perm = [];
   }
}

$state_colours = [
   'VIC' => ['bg' => 'rgba(59,130,246,0.2)', 'text' => '#93c5fd'],
   'NSW' => ['bg' => 'rgba(34,197,94,0.2)', 'text' => '#86efac'],
   'SA' => ['bg' => 'rgba(251,191,36,0.2)', 'text' => '#fcd34d']
];
$temp_zones = [
   ['id' => 8, 'label' => 'VIC Murray Z6 (Above Choke)', 'state' => 'VIC'],
   ['id' => 10, 'label' => 'VIC Murray Z7 (Below Choke)', 'state' => 'VIC'],
   ['id' => 1, 'label' => 'VIC Goulburn', 'state' => 'VIC'],
   ['id' => 11, 'label' => 'NSW Murray Z10', 'state' => 'NSW'],
   ['id' => 12, 'label' => 'NSW Murray Z11', 'state' => 'NSW'],
   ['id' => 14, 'label' => 'NSW Murrumbidgee', 'state' => 'NSW'],
   ['id' => 13, 'label' => 'SA Murray Z12', 'state' => 'SA']
];

function tbwe_format_date($iso)
{
   if (!$iso)
      return '';
   try {
      $date = new DateTime($iso);
      $date->setTimezone(new DateTimeZone('Australia/Brisbane'));
      return 'Updated ' . $date->format('j M, g:i a') . ' AEST';
   } catch (Exception $e) {
      return '';
   }
}

function tbwe_format_short_date($iso)
{
   if (!$iso)
      return '—';
   try {
      $date = new DateTime($iso);
      $date->setTimezone(new DateTimeZone('Australia/Brisbane'));
      return $date->format('j M Y');
   } catch (Exception $e) {
      return '—';
   }
}

$tempPrices = $data_temp['tempPrices'] ?? [];
$allocations = $data_temp['allocations'] ?? [];
$fetchedAtTemp = tbwe_format_date($data_temp['fetchedAt'] ?? '');

$permPrices = $data_perm['prices'] ?? [];
$fetchedAtPerm = tbwe_format_date($data_perm['fetchedAt'] ?? '');

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

<style>
   @keyframes tbwePulse {

      0%,
      100% {
         opacity: 1;
      }

      50% {
         opacity: 0.3;
      }
   }
</style>

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
                     <?php if (!$temp_api['hide_table']): ?>
                        <!-- SLIDE 1: Temporary Water Prices -->
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
                                          <span
                                             style="color:rgba(255,255,255,0.45); font-size:12px;"><?php echo esc_html($fetchedAtTemp); ?></span>
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
                                       <tbody>
                                          <?php
                                          if (empty($data_temp)):
                                             ?>
                                             <tr>
                                                <td colspan="4"
                                                   style="padding:20px 0; color:rgba(255,255,255,0.4); font-size:14px; text-align:center;">
                                                   Unable to load live prices.</td>
                                             </tr>
                                             <?php
                                          else:
                                             foreach ($temp_zones as $z):
                                                $price = isset($tempPrices[$z['id']]) ? $tempPrices[$z['id']]['price'] : null;
                                                $alloc = isset($allocations[$z['id']]) ? ($allocations[$z['id']]['hr'] !== null ? $allocations[$z['id']]['hr'] : $allocations[$z['id']]['lr']) : null;
                                                $col = $state_colours[$z['state']] ?? ['bg' => 'rgba(255,255,255,0.1)', 'text' => '#fff'];
                                                ?>
                                                <tr>
                                                   <td
                                                      style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                                      <?php echo esc_html($z['label']); ?>
                                                   </td>
                                                   <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                                      <span
                                                         style="background:<?php echo esc_attr($col['bg']); ?>;color:<?php echo esc_attr($col['text']); ?>;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;"><?php echo esc_html($z['state']); ?></span>
                                                   </td>
                                                   <td
                                                      style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#007AFF;font-weight:700;font-size:16px;">
                                                      <?php echo $price ? '$' . number_format(round($price)) : '$—'; ?>
                                                   </td>
                                                   <td
                                                      style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.7);font-size:15px;">
                                                      <?php echo ($alloc !== null) ? round($alloc) . '%' : '—'; ?>
                                                   </td>
                                                </tr>
                                                <?php
                                             endforeach;
                                          endif;
                                          ?>
                                       </tbody>
                                    </table>
                                    <div
                                       style="margin-top:20px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.08);"
                                       bis_skin_checked="1">
                                       <p style="color:rgba(255,255,255,0.35); font-size:11px; margin:0;">Indicative
                                          pricing only. Contact a TBWE broker for live quotes. Prices update daily.</p>
                                    </div>
                                 </div>
                                 <?php if ($temp_api['temp_api_button']): ?>
                                    <div style="text-align:center; margin-top:32px;" bis_skin_checked="1">
                                       <a href="<?php echo $temp_api['temp_api_button']['url'] ?>"
                                          style="display:inline-block; background:#007AFF; color:#fff; padding:14px 32px; border-radius:12px; text-decoration:none; font-size:15px; font-weight:600;"
                                          target="<?php echo $temp_api['temp_api_button']['target'] ?>"><?php echo $temp_api['temp_api_button']['title'] ?>
                                          →</a>
                                    </div>
                                 <?php endif; ?>
                              </div>
                           </section>
                        </div>
                     <?php endif; ?>

                     <?php if (!$perm_api['hide_table']): ?>
                        <!-- SLIDE 2: Permanent Water Entitlement Prices -->
                        <div class="tbl_slid_item">
                           <section style="">
                              <div style="max-width:100%; margin: 0 auto;" bis_skin_checked="1">
                                 <div style="text-align:center; margin-bottom: 40px;" bis_skin_checked="1">
                                    <h2 style="color:#fff; font-size: 2rem; font-weight: 700; margin-bottom: 10px;">
                                       Permanent Water Entitlement Prices</h2>
                                    <p style="color:rgba(255,255,255,0.8); font-size: 1rem;">Last traded prices — sourced
                                       from TrueBlue Water Exchange &amp; Registry</p>
                                 </div>
                                 <div
                                    style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.15); border-radius:20px; padding:32px; overflow-x:auto;"
                                    bis_skin_checked="1">
                                    <div
                                       style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; flex-wrap:wrap; gap:10px;"
                                       bis_skin_checked="1">
                                       <span style="color:#fff; font-weight:700; font-size:18px;">Permanent Entitlement
                                          Market</span>
                                       <div style="display:flex; align-items:center; gap:14px; flex-wrap:wrap;"
                                          bis_skin_checked="1">
                                          <span
                                             style="color:rgba(255,255,255,0.45); font-size:12px;"><?php echo esc_html($fetchedAtPerm); ?></span>
                                          <span
                                             style="display:inline-flex; align-items:center; gap:6px; background:rgba(251,191,36,0.12); border:1px solid rgba(251,191,36,0.3); border-radius:50px; padding:5px 14px;">
                                             <span
                                                style="width:8px; height:8px; background:#FCD34D; border-radius:50%; display:inline-block;"></span>
                                             <span
                                                style="color:#FCD34D; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px;">Live</span>
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
                                                Last Trade</th>
                                             <th
                                                style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                                Date</th>
                                             <th
                                                style="color:rgba(255,255,255,0.5); font-size:11px; font-weight:600; text-transform:uppercase; padding:0 0 14px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.1); letter-spacing:0.8px;">
                                                Source</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          if (empty($permPrices)):
                                             ?>
                                             <tr>
                                                <td colspan="5"
                                                   style="padding:20px 0; color:rgba(255,255,255,0.4); font-size:14px; text-align:center;">
                                                   Unable to load permanent prices.</td>
                                             </tr>
                                             <?php
                                          else:
                                             foreach ($permPrices as $p):

                                                $col = $state_colours[$p['state']] ?? ['bg' => 'rgba(255,255,255,0.1)', 'text' => '#fff'];
                                                $srcLabel = ($p['source'] === 'tbwe') ? 'TBWE' : (($p['source'] === 'registry') ? 'Registry' : '—');
                                                $srcColour = ($p['source'] === 'tbwe') ? '#60A5FA' : (($p['source'] === 'registry') ? '#A78BFA' : 'rgba(255,255,255,0.3)');
                                                ?>
                                                <tr>
                                                   <td
                                                      style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.85);font-size:15px;">
                                                      <?php echo esc_html($p['shortLabel'] ?? ''); ?>
                                                   </td>
                                                   <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                                      <span
                                                         style="background:<?php echo esc_attr($col['bg']); ?>;color:<?php echo esc_attr($col['text']); ?>;font-size:11px;font-weight:700;padding:3px 10px;border-radius:50px;"><?php echo esc_html($p['state'] ?? ''); ?></span>
                                                   </td>
                                                   <td
                                                      style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:#FCD34D;font-weight:700;font-size:16px;">
                                                      <?php echo !empty($p['lastTradePrice']) ? '$' . number_format(round($p['lastTradePrice'])) : '$—'; ?>
                                                   </td>
                                                   <td
                                                      style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);color:rgba(255,255,255,0.55);font-size:13px;">
                                                      <?php echo tbwe_format_short_date($p['lastTradeDate'] ?? ''); ?>
                                                   </td>
                                                   <td style="padding:14px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                                                      <span
                                                         style="color:<?php echo esc_attr($srcColour); ?>;font-size:11px;font-weight:600;"><?php echo esc_html($srcLabel); ?></span>
                                                   </td>
                                                </tr>
                                                <?php
                                             endforeach;
                                          endif;
                                          ?>
                                       </tbody>
                                    </table>
                                    <div
                                       style="margin-top:20px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.08);"
                                       bis_skin_checked="1">
                                       <p style="color:rgba(255,255,255,0.35); font-size:11px; margin:0;">Last traded
                                          prices only. Contact a TBWE broker for current market pricing. Updated every 6
                                          hours. Registry = sourced from water registry data.</p>
                                    </div>
                                    <?php if ($perm_api['per_api_button']): ?>
                                       <div style="text-align:center; margin-top:32px;" bis_skin_checked="1">
                                          <a href="<?php echo $perm_api['per_api_button']['url'] ?>"
                                             style="display:inline-block; background:#007AFF; color:#fff; padding:14px 32px; border-radius:12px; text-decoration:none; font-size:15px; font-weight:600;"
                                             target="<?php echo $perm_api['per_api_button']['target'] ?>"><?php echo $perm_api['per_api_button']['title'] ?>
                                             →</a>
                                       </div>
                                    <?php endif; ?>
                                 </div>
                           </section>
                        </div>
                     <?php endif; ?>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Banner End -->