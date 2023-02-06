


<div class="blog-section blog-section-1">
    <div class="blog-section-wrapper">
        <div class="container">
            <div class="row gx-5">

                                              <table class="table table-responsive-md table-hover " id="request_table" style="font-size:larger">
                                                  <thead>
                                                  <tr >
                                                      <th class="width80"><strong>#</strong></th>
                                                      <th><strong>نام</strong></th>
                                                      <th><strong>تماس</strong></th>
                                                      <th><strong>تاریخ</strong></th>
													   <th><strong>سایز</strong></th>
                                                      <th><strong>فرم چاپ</strong></th>
                                                      <th><strong>رنگ</strong></th>
                                                      <th><strong>خدمات</strong></th>
                                                      <th><strong>تعداد سری</strong></th>
                                                      <th><strong>جنس کاغذ</strong></th>
                                                      <th><strong>نحوه سفارش</strong></th>
                                                      <th><strong>نام فایل</strong></th>
                                                      <th><strong>دانلود</strong></th>


                                                  </tr>
                                                  </thead>
                                                  <tbody>
												  <?php
									/**  Gregorian & Jalali (Hijri_Shamsi,Solar) Date Converter Functions
									Author: JDF.SCR.IR =>> Download Full Version :  http://jdf.scr.ir/jdf
									License: GNU/LGPL _ Open Source & Free :: Version: 2.80 : [2020=1399]
									---------------------------------------------------------------------
									355746=361590-5844 & 361590=(30*33*365)+(30*8) & 5844=(16*365)+(16/4)
									355666=355746-79-1 & 355668=355746-79+1 &  1595=605+990 &  605=621-16
									990=30*33 & 12053=(365*33)+(32/4) & 36524=(365*100)+(100/4)-(100/100)
									1461=(365*4)+(4/4) & 146097=(365*400)+(400/4)-(400/100)+(400/400)  */

									function gregorian_to_jalali($gy, $gm, $gd, $mod='') {
									  $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
									  $gy2 = ($gm > 2)? ($gy + 1) : $gy;
									  $days = 355666 + (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) + $gd + $g_d_m[$gm - 1];
									  $jy = -1595 + (33 * ((int)($days / 12053)));
									  $days %= 12053;
									  $jy += 4 * ((int)($days / 1461));
									  $days %= 1461;
									  if ($days > 365) {
										$jy += (int)(($days - 1) / 365);
										$days = ($days - 1) % 365;
									  }
									  if ($days < 186) {
										$jm = 1 + (int)($days / 31);
										$jd = 1 + ($days % 31);
									  } else{
										$jm = 7 + (int)(($days - 186) / 30);
										$jd = 1 + (($days - 186) % 30);
									  }
									  return ($mod == '')? array($jy, $jm, $jd) : $jy.$mod.$jm.$mod.$jd;
									}

														$servername = "localhost";
														$username = "ekadprin_root";
														$password = "84323267Man!@#";
														$dbname = "ekadprin_ekad";
														$paper_size = [
															"4" => "A4",
															"3" => "A3",
															"5" => "A5",
															"0" => "مشخصی نشده",
														];
														$paper_form = [
															"0" => "تک رو",
															"1" => "دو رو",

														];
														$paper_type = [
															"1" => "تحریر",
															"2" => "گلاسه",
															"3" => "گرم بالا",

														];
														$delivery_type = [
															"1" => "حضوری",
															"2" => "پیک",


														];
														$color_type = [
															"0" => "سیاه و سفید",
															"1" => "رنگی",

														];
														$service_type = [

															"1" => "طلق و شیرازه",
															"2" => "سیمی",
															"3" => "منگنه",
															"4" => "برچسب",
															"5" => "لمینت",

														];

														// Create connection
														$conn = new mysqli($servername, $username, $password, $dbname);
														// Check connection
														if ($conn->connect_error) {
														  die("Connection failed: " . $conn->connect_error);
														}

														$sql = "SELECT `id`, `size`, `paper_type`, `color_type`, (`current_date`) as dt, `paper_form`, `seri`, `service_type`, `nm`, `tamas`, `myfile`, `delivery_type` FROM `request` ORDER BY `request`.`current_date` DESC";
														$result = $conn->query($sql);

														if ($result->num_rows > 0) {
														  // output data of each row
														  $i=0;
														  while($row = $result->fetch_assoc()) {
															  ?>
															    <tr >
                                                      <td><strong><?php echo $row["id"];?></strong></td>
                                                      <td><?php echo $row["nm"];?></td>
                                                       <td><?php echo $row["tamas"];?></td>

                                                       <td><?php echo $row["dt"]?></td>
													    <td><?php echo $paper_size[$row["size"]];?></td>
													    <td><?php echo $paper_form[$row["paper_form"]];?></td>
														 <td><?php echo $color_type[$row["color_type"]];?></td>
														  <td><?php echo $service_type[$row["service_type"]];?></td>
														   <td><?php echo $row["seri"];?></td>
														    <td><?php echo $paper_type[$row["paper_type"]];?></td>
															 <td><?php echo $delivery_type[$row["delivery_type"]];?></td>
															 <td><?php echo $row["myfile"];?></td>



                                                      <td>
                                                          <div class="d-flex">
                                                            <?php
                                                            $val=$row['myfile'];

                                                               echo "<a href='images/$val' class='btn btn-primary shadow btn-xs sharp mr-1' target='_blank'><i class='fa fa-download'></i></a>";
                                                             ?>

                                                <a href="#" class="btn btn-danger shadow btn-xs sharp request_delete" data_url="<?php echo $row['id'];?>"><i class="fa fa-trash"></i></a>
                                            </div>
                                                      </td>
                                                  </tr>

															  <?php

														  }
														} else {
														  echo "0 results";
														}
														$conn->close();
														?>

                                                </tbody>
                                              </table>

            </div>
            <div class="row">
                <div class="col">
                    <!--
                    load more - start
                    -->
                    <a href="#" class="button button-3">
                        <div class="button-inner">
                            <div class="button-content">
                                <h4>بارگذاری بیشتر</h4>
                            </div>
                        </div>
                    </a>
                    <!--
                    load more - end
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
