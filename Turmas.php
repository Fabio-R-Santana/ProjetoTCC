<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Turmas.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Link para a biblioteca de ícones bootstrap icons -->
    <title>Página de turmas</title>
</head>
<body>
<header>
        <nav class="menu-lateral">

            <div class="btn-expandir">
            <i class="bi bi-list"></i>
            </div>
            <ul>
                <li class="item-menu">
                    <a href="index.php">
                        <span class="icon"><i class="bi bi-house-door"></i></span>
                        <span class="tct-link">Homepage</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="perfil.php">
                        <span class="icon"><i class="bi bi-person-circle"></i></span>
                        <span class="tct-link">Perfil</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="Formulario.php">
                        <span class="icon"><i class="bi bi-person-fill-gear"></i></span>
                        <span class="tct-link">Login</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="Calendario.php">
                        <span class="icon"><i class="bi bi-calendar"></i></span>
                        <span class="tct-link">Calendario</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="Turmas.php">
                        <span class="icon"><i class="bi bi-book"></i></span>
                        <span class="tct-link">Turmas</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="logout.php">
                        <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                        <span class="tct-link">Logout</span>
                    </a>
                </li>
            </ul>

        </nav>
</header> 
<!-- Título e botão para adicionar turmas -->
<div class="headerzao">
    <h1>Página de Turmas</h1>
    <button onclick="addClass()">Adicionar Turma</button>
</div>

<!-- Container principal que engloba todos os professores e suas matérias -->
<div class="container" id="class-container">

    <div class="professor-container" data-subject="Matemática">
        <div class="profile-pic">
            <img src="https://via.placeholder.com/150" alt="Foto do Professor">
        </div>
        <div class="professor-info">
            <h3>Professor João da Silva</h3>
            <p>Matéria: Matemática</p>
            <p>Turma: 1A</p>
        </div>
        <button class="action-btn">Ver Detalhes</button>
    </div>

    <div class="professor-container" data-subject="Física">
        <div class="profile-pic">
            <img src="https://via.placeholder.com/150" alt="Foto do Professor">
        </div>
        <div class="professor-info">
            <h3>Professora Maria Souza</h3>
            <p>Matéria: Física</p>
            <p>Turma: 2B</p>
        </div>
        <button class="action-btn">Ver Detalhes</button>
    </div>

    <div class="professor-container" data-subject="Biologia">
        <div class="profile-pic">
            <img src="https://via.placeholder.com/150" alt="Foto do Professor">
        </div>
        <div class="professor-info">
            <h3>Professor Carlos Pereira</h3>
            <p>Matéria: Biologia</p>
            <p>Turma: 3C</p>
        </div>
        <button class="action-btn">Ver Detalhes</button>
    </div>

    <!-- Adicione outros professores conforme necessário -->

</div>
<!-- Fim do container principal -->

<div id="details-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 id="subject-name"></h2>
        <h3 id="teacher-name"></h3>
        <ul id="student-list"></ul>
        <button onclick="addStudent()">Adicionar Aluno</button>
        <button onclick="removeStudent()">Remover Aluno</button>
        <button onclick="editClass()">Editar Turma</button>
        <button onclick="deleteClass()">Excluir Turma</button>
    </div>
</div>

<script>
    const students = {
        "Matemática": ["Alice", "Bruno", "Carlos"],
        "Física": ["Daniela", "Eduardo", "Fernanda"],
        "Biologia": ["Gabriel", "Helena"],
        // Adicione outras matérias e alunos conforme necessário
    };

    function showDetails(subject, teacher) {
        document.getElementById('subject-name').innerText = `Matéria: ${subject}`;
        document.getElementById('teacher-name').innerText = `Professor(a): ${teacher}`;
        const studentList = document.getElementById('student-list');
        studentList.innerHTML = '';
        students[subject].forEach(student => {
            const li = document.createElement('li');
            li.innerText = student;
            studentList.appendChild(li);
        });
        document.getElementById('details-modal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('details-modal').style.display = 'none';
    }

    function addStudent() {
        const studentName = prompt("Digite o nome do novo aluno:");
        if (studentName) {
            const subject = document.getElementById('subject-name').innerText.split(": ")[1];
            students[subject].push(studentName);
            showDetails(subject, document.getElementById('teacher-name').innerText.split(": ")[1]);
        }
    }

    function removeStudent() {
        const studentName = prompt("Digite o nome do aluno a ser removido:");
        const subject = document.getElementById('subject-name').innerText.split(": ")[1];
        if (studentName) {
            const index = students[subject].indexOf(studentName);
            if (index > -1) {
                students[subject].splice(index, 1);
                showDetails(subject, document.getElementById('teacher-name').innerText.split(": ")[1]);
            } else {
                alert("Aluno não encontrado.");
            }
        }
    }

    function editClass() {
    const subject = document.getElementById('subject-name').innerText.split(": ")[1];
    const currentClassContainer = document.querySelector(`.professor-container[data-subject='${subject}']`);

    const currentTeacherName = document.getElementById('teacher-name').innerText.split(": ")[1];
    const currentStudents = students[subject].join(", ");

    const newSubject = prompt("Digite a nova matéria:", subject);
    const newClassName = prompt("Digite o novo nome da turma:", currentClassContainer.querySelector('.professor-info p:nth-of-type(2)').innerText.split(": ")[1]);
    const newTeacherName = prompt("Digite o novo nome do professor:", currentTeacherName);
    
    // Editar alunos
    const newStudentNames = prompt("Digite os novos alunos (separados por vírgula):", currentStudents);
    const newStudents = newStudentNames ? newStudentNames.split(",").map(name => name.trim()) : [];

    if (newClassName && newTeacherName) {
        // Remove a turma antiga do objeto students
        delete students[subject];

        // Atualiza os dados com a nova matéria
        students[newSubject] = newStudents;

        // Atualiza o template com os novos dados
        currentClassContainer.setAttribute('data-subject', newSubject);
        currentClassContainer.querySelector('.professor-info h3').innerText = newTeacherName;
        currentClassContainer.querySelector('.professor-info p:nth-of-type(1)').innerText = `Matéria: ${newSubject}`;
        currentClassContainer.querySelector('.professor-info p:nth-of-type(2)').innerText = `Turma: ${newClassName}`;

        // Atualiza a lista de alunos no modal
        showDetails(newSubject, newTeacherName);
    }
}

    function deleteClass() {
    const subject = document.getElementById('subject-name').innerText.split(": ")[1];
    const confirmDelete = confirm(`Tem certeza que deseja excluir a turma de ${subject}?`);
    if (confirmDelete) {
        delete students[subject];
        closeModal();

        // Remover o elemento do DOM
        const classContainer = document.getElementById('class-container');
        const professorContainers = document.querySelectorAll('.professor-container');
        
        professorContainers.forEach(container => {
            if (container.getAttribute('data-subject') === subject) {
                classContainer.removeChild(container);
            }
        });

        alert(`Turma de ${subject} excluída.`);
    }
}

    function addClass() {
        const className = prompt("Digite o nome da nova turma:");
        const teacherName = prompt("Digite o nome do professor:");
        const subject = prompt("Digite a matéria:");
        if (className && teacherName && subject) {
            students[subject] = [];  // Cria uma nova turma vazia
            const classContainer = document.getElementById('class-container');
            const newClassDiv = document.createElement('div');
            newClassDiv.className = 'professor-container';
            newClassDiv.setAttribute('data-subject', subject);
            newClassDiv.innerHTML = `
                <div class="profile-pic">
                    <img src="https://via.placeholder.com/150" alt="Foto do Professor">
                </div>
                <div class="professor-info">
                    <h3>${teacherName}</h3>
                    <p>Matéria: ${subject}</p>
                    <p>Turma: ${className}</p>
                </div>
                <button class="action-btn">Ver Detalhes</button>
            `;
            classContainer.appendChild(newClassDiv);

            // Adiciona o evento para mostrar detalhes na nova turma
            newClassDiv.querySelector('.action-btn').addEventListener('click', () => {
                showDetails(subject, teacherName);
            });

            alert(`Turma de ${className} adicionada com sucesso!`);
        }
    }

    document.querySelectorAll('.action-btn').forEach((button, index) => {
        button.addEventListener('click', () => {
            const professorContainers = document.querySelectorAll('.professor-container');
            const subject = professorContainers[index].querySelector('.professor-info p').innerText.split(": ")[1];
            const teacher = professorContainers[index].querySelector('.professor-info h3').innerText;
            showDetails(subject, teacher);
        });
    });
</script> 
</body>
</html>