<?php
$page_title = 'LSCL Enhancements Page';
include 'header.inc';
?>

<main>
  <h2>Enhancements</h2>
  <ul>
    <li>
      <strong>Accessibility:</strong> Used semantic tags like <code>&lt;figure&gt;</code> and <code>&lt;caption&gt;</code>, added alt attributes, and ensured colour contrast.
    </li>
    <li>
      <strong>Responsive Design:</strong> Applied Flexbox and media queries for better mobile support across different devices.
    </li>
    <li>
      <strong>Modular Code:</strong> Used PHP includes for <code>header</code> and <code>footer</code> to reduce repetition and improve maintainability.
    </li>
    <li>
      <strong>Manage Page Features:</strong> Implemented search, update, delete, and filter capabilities for job applications through the database.
    </li>
    <li>
      <strong>Validation:</strong> Both client-side and server-side validation were applied to ensure accurate user input in the application form.
    </li>
  </ul>
</main>

<?php include 'footer.inc'; ?>
