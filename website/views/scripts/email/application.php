<?php $formName = "application_"; ?>

<table>
    <tr>
        <th colspan="2">Application for employment</th>
    </tr>
    <tr>
        <td>Name: </td>
        <td><?= $this->data[$formName . 'name']; ?></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><?= $this->data[$formName . 'email']; ?></td>
    </tr>
    <tr>
        <td>Number: </td>
        <td><?= $this->data[$formName . 'number']; ?></td>
    </tr>
    <tr>
        <td>Care home: </td>
        <td><?= $this->data[$formName . 'careHomes']; ?></td>
    </tr>
    <tr>
        <td>Role interested in: </td>
        <td><?= $this->data[$formName . 'vacancyRoles']; ?></td>
    </tr>
    <tr>
        <td>Covering letter: </td>
        <td><?= str_replace("\n", "<br />", $this->data[$formName . 'coverLetter']); ?></td>
    </tr>
</table>

