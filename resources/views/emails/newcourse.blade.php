
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Course Launched</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, sans-serif; color:#333;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 10px;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="max-width:600px; width:100%; background:#ffffff; border-radius:10px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#172554; padding:25px; text-align:center; color:white;">
                            <h2 style="margin:0;">Yeasin Arafat</h2>
                            <p style="margin:8px 0 0; color:#dbeafe;">New Course Announcement</p>
                        </td>
                    </tr>

             
                    <tr>
                        <td>
                            <img src="https://codewithharry.nyc3.cdn.digitaloceanspaces.com/dashboard/course/the-ultimate-job-ready-ai-powered-data-analytics-course/1764230030679-3.png"
                                alt="Course Thumbnail"
                                width="600"
                                style="width:100%; height:auto; display:block;">
                        </td>
                    </tr>

                    <!-- Course Details -->
                    <tr>
                        <td style="padding:30px;">

                            <span style="background:#dbeafe; color:#1d4ed8; padding:6px 12px; border-radius:20px; font-size:12px;">
                                NEW COURSE
                            </span>

                            <h1 style="font-size:25px; margin:18px 0 12px; color:#172554;">
                                {{ $course->name }}
                            </h1>

                            <p style="font-size:14px; line-height:1.7; color:#64748b;">
                               {{ $course->description }}

                            <!-- Price -->
                            <p style="margin:20px 0;">
                                <strong style="font-size:25px; color:#172554;">${{$course->price}}</strong>
                                <del style="color:#94a3b8; margin-left:8px;">${{ $course->original_price }}</del>
                            </p>

                            <!-- CTA -->
                            <a href="http://localhost:8000/course/{{ $course->slug }}"
                                style="display:inline-block; background:#2563eb; color:#ffffff;
                                text-decoration:none; padding:13px 25px; border-radius:6px;
                                font-weight:bold; font-size:14px;">
                                Explore Course →
                            </a>

                        </td>
                    </tr>

                    <!-- Course Statistics -->
                  
                    <!-- Curriculum -->
                    <tr>
                        <td style="padding:10px 30px 25px;">
                            <h2 style="font-size:19px; color:#172554;">Course Curriculum</h2>

                            <table width="100%" cellpadding="12" cellspacing="0">
                                <tr style="border-bottom:1px solid #e2e8f0;">
                                    <td style="font-size:14px;">Introduction to Data Science</td>
                                    <td align="right" style="font-size:13px; color:#64748b;">28 min</td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;">Understanding the Conda Environment</td>
                                    <td align="right" style="font-size:13px; color:#64748b;">37 min</td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;">Python Refresher (For Data Science)</td>
                                    <td align="right" style="font-size:13px; color:#64748b;">137 min</td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;">Claim your Free Developer Tools</td>
                                    <td align="right" style="font-size:13px; color:#64748b;">6 min</td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px;">Project 1 - Coders of Delhi</td>
                                    <td align="right" style="font-size:13px; color:#64748b;">59 min</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Teachers -->
                    <tr>
                        <td style="padding:10px 30px 30px;">
                            <h2 style="font-size:19px; color:#172554;">Meet Your Teachers</h2>

                            <p style="font-size:14px; line-height:1.7;">
                                <strong>Teacher Arafat</strong><br>
                                <a href="mailto:teacherarafat@gmail.com" style="color:#2563eb;">
                                    teacherarafat@gmail.com
                                </a>
                            </p>

                            <p style="font-size:14px; line-height:1.7;">
                                <strong>Md Azizul Rahman</strong><br>
                                <a href="mailto:mdazizulrahman3616@gmail.com" style="color:#2563eb;">
                                    mdazizulrahman3616@gmail.com
                                </a>
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8fafc; padding:25px; text-align:center;">

                            <p style="font-size:12px; color:#64748b;">
                                <a href="WEBSITE_URL" style="color:#2563eb; text-decoration:none;">Home</a>
                                &nbsp; | &nbsp;
                                <a href="COURSES_URL" style="color:#2563eb; text-decoration:none;">Courses</a>
                                &nbsp; | &nbsp;
                                <a href="ABOUT_URL" style="color:#2563eb; text-decoration:none;">About</a>
                                &nbsp; | &nbsp;
                                <a href="CONTACT_URL" style="color:#2563eb; text-decoration:none;">Contact</a>
                            </p>

                            <p style="font-size:12px; color:#94a3b8; margin-top:20px;">
                                © 2026 Laravel. All rights reserved.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
