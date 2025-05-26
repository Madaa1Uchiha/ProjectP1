<?php
$page_title = 'LSCL About Page';
include 'header.inc';
?>

<main>
  <section>
    <h2>Group Information</h2>
    <p><strong>Group Name:</strong> LSCL</p>
    <p><strong>Class Time:</strong> Friday 8:30 – 10:30 AM</p>
    <p><strong>Tutor:</strong> Razeen</p>
  </section>

  <section>
    <h2>Group Members</h2>
    <ul>
      <li><span class="member-name">Sebastian Mills</span> <span class="student-id">105828391</span></li>
      <li><span class="member-name">Samuel Macciocca</span> <span class="student-id">105412587</span></li>
      <li><span class="member-name">Cole Souquet-Wigg</span> <span class="student-id">104558037</span></li>
      <li><span class="member-name">Leo Ali</span> <span class="student-id">105923814</span></li>
    </ul>
  </section>

  <section>
    <h2>Member Contributions</h2>
    <dl>
      <dt>Sebastian Mills</dt>
      <dd>PHP Lead – Modular structure, includes (<code>header.inc</code>, <code>footer.inc</code>), <code>index.php</code>, overall site structure</dd>

      <dt>Samuel Macciocca</dt>
      <dd>Job Listings – Created <code>jobs.php</code>, designed and loaded jobs from MySQL</dd>

      <dt>Cole Souquet-Wigg</dt>
      <dd>Application Processing – Developed <code>apply.php</code>, <code>process_eoi.php</code>, validation, EOI table insertion, <code>manage.php</code> logic</dd>

      <dt>Leo Ali</dt>
      <dd>Styling & Accessibility – Designed <code>styles.css</code>, implemented accessibility features, updated <code>about.php</code>, and created <code>enhancements.php</code></dd>
    </dl>
  </section>

  <section>
    <h2>Group Photo</h2>
    <figure class="group-photo">
      <img src="images/group-photo.jpg" alt="LSCL group photo" />
      <figcaption>Team LSCL: Sebastian, Samuel, Cole, and Leo</figcaption>
    </figure>
  </section>

  <section>
    <h2>Group Interests</h2>
    <table>
      <caption>Group Member Interests</caption>
      <thead>
        <tr>
          <th>Name</th>
          <th>Interest(s)</th>
        </tr>
      </thead>
      <tbody>
        <tr><td rowspan="2">Leo Ali</td><td>Gaming</td></tr>
        <tr><td>Web Design</td></tr>
        <tr><td>Samuel Macciocca</td><td>Software Engineering</td></tr>
        <tr><td>Sebastian Mills</td><td>Networking, Game Development</td></tr>
        <tr><td>Cole Souquet-Wigg</td><td>Cybersecurity, AI</td></tr>
      </tbody>
    </table>
  </section>
</main>

<?php include 'footer.inc'; ?>