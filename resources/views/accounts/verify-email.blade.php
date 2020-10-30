@extends('layouts.master-mail')
@section('content')

    <body class="jira" style="color: #333; font-family: Arial, sans-serif; font-size: 14px; line-height: 1.429">
        <table id="background-table" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f5f5f5; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt">
            <!-- header here -->
            <tr>
                <td id="header-pattern-container" style="padding: 0px; border-collapse: collapse; padding: 10px 20px">
                    <table id="header-pattern" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt">
                        <tr>
                            <td id="header-text-container" valign="middle" style="padding: 0px; border-collapse: collapse; vertical-align: middle; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; mso-line-height-rule: exactly; mso-text-raise: 1px">
                              Please click on the link below to verify the user.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td id="email-content-container" style="padding: 0px; border-collapse: collapse; padding: 0 20px">
                    <table id="email-content-table" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-spacing: 0; border-collapse: separate">
                        <tr>
                            <!-- there needs to be content in the cell for it to render in some clients -->
                            <td class="email-content-rounded-top mobile-expand" style="padding: 0px; border-collapse: collapse; color: #fff; padding: 0 15px 0 16px; height: 15px; background-color: #fff; border-left: 1px solid #ccc; border-top: 1px solid #ccc; border-right: 1px solid #ccc; border-bottom: 0; border-top-right-radius: 5px; border-top-left-radius: 5px; height: 10px; line-height: 10px; padding: 0 15px 0 16px; mso-line-height-rule: exactly">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td class="email-content-main mobile-expand  issue-description-container" style="padding: 0px; border-collapse: collapse; border-left: 1px solid #ccc; border-right: 1px solid #ccc; border-top: 0; border-bottom: 0; padding: 0 15px 0 16px; background-color: #fff; padding-top: 5px; padding-bottom: 10px">
                                <table class="text-paragraph-pattern" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; mso-line-height-rule: exactly; mso-text-raise: 2px">
                                    <tr>
                                        <td class="text-paragraph-pattern-container mobile-resize-text " style="padding: 0px; border-collapse: collapse; padding: 0 0 10px 0">
                                            <p style="margin-top:0;margin-bottom:10px;; margin: 10px 0 0 0">{{ $verify_link }}</p>
                                            <br>
                                            <ul style="margin: 10px 0px 0px; color: rgb(51, 51, 51); text-transform: none; line-height: 20px; text-indent: 0px; letter-spacing: normal; font-family: Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: normal; word-spacing: 0px; list-style-type: disc; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px;">

                                            </ul> <span class="jeditor_renderer" renderer="html" name="78d63738efc4c4b95f8f8487dda9f4f0" style="display:none"></span>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="email-content-main mobile-expand " style="padding: 0px; border-collapse: collapse; border-left: 1px solid #ccc; border-right: 1px solid #ccc; border-top: 0; border-bottom: 0; padding: 0 15px 0 16px; background-color: #fff">
                                <table id="actions-pattern" cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; mso-line-height-rule: exactly; mso-text-raise: 1px">
                                    <tr>
                                        <td id="actions-pattern-container" valign="middle" style="padding: 0px; border-collapse: collapse; padding: 10px 0 10px 24px; vertical-align: middle; padding-left: 0">
                                            <table align="left" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt">

                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- there needs to be content in the cell for it to render in some clients -->
                        <tr>
                            <td class="email-content-rounded-bottom mobile-expand" style="padding: 0px; border-collapse: collapse; color: #fff; padding: 0 15px 0 16px; height: 5px; line-height: 5px; background-color: #fff; border-top: 0; border-left: 1px solid #ccc; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; mso-line-height-rule: exactly">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td id="footer-pattern" style="padding: 0px; border-collapse: collapse; padding: 12px 20px">
                    <table id="footer-pattern-container" cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt">
                        <tr>
                            <td id="footer-pattern-text" class="mobile-resize-text" width="100%" style="padding: 0px; border-collapse: collapse; color: #999; font-size: 12px; line-height: 18px; font-family: Arial, sans-serif; mso-line-height-rule: exactly; mso-text-raise: 2px">
                                 This message was sent by Software Monitoring System(S.M.S)  <span id="footer-build-information"></span>
                            </td>
                            <td id="footer-pattern-logo-desktop-container" valign="top" style="padding: 0px; border-collapse: collapse; padding-left: 20px; vertical-align: top">
                                <table style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt">
                                    <!--tr>
                                        <td id="footer-pattern-logo-desktop-padding" style="padding: 0px; border-collapse: collapse; padding-top: 3px"> <img id="footer-pattern-logo-desktop" src="cid:jira-generated-image-static-footer-desktop-logo-91ea7a5d-c967-4ef9-929c-de14f23c34ce" alt="Atlassian logo" title="Atlassian logo" width="169" height="36" class="image_fix">
                                        </td>
                                    </tr-->
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

@stop
