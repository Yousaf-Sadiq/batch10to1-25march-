#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/wait.h>

#define BUFFER_SIZE 256

int main() {
    int pipefd[2];
    pid_t pid;
    char buffer[BUFFER_SIZE];
    int nbytes;

    // Create pipe
    if (pipe(pipefd) == -1) {
        perror("pipe");
        exit(EXIT_FAILURE);
    }

    // Fork a child process
    pid = fork();

    if (pid == -1) {
        perror("fork");
        exit(EXIT_FAILURE);
    }

    if (pid == 0) {  // Child process
        // Close the write end of the pipe
        close(pipefd[1]);

        // Read from the pipe
        nbytes = read(pipefd[0], buffer, BUFFER_SIZE);
        if (nbytes == -1) {
            perror("read");
            exit(EXIT_FAILURE);
        }

        printf("Child received message: %s", buffer);

        // Close the read end of the pipe
        close(pipefd[0]);
        exit(EXIT_SUCCESS);
    } else {  // Parent process
        // Close the read end of the pipe
        close(pipefd[0]);

        // Write to the pipe
        printf("Enter message to send to child: ");
        fgets(buffer, BUFFER_SIZE, stdin);
        write(pipefd[1], buffer, BUFFER_SIZE);

        // Close the write end of the pipe
        close(pipefd[1]);

        // Wait for the child to finish
        wait(NULL);
        exit(EXIT_SUCCESS);
    }

    return 0;
}
