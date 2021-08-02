import java.util.Scanner;

public class UserInterface {
    private static void menu () {
        System.out.println("Select the language.");
        System.out.println("Press 1 for Telugu.");
        System.out.println("Press 2 for English.");
    }

    private static boolean validateInput(String input) {
        int numberInput;
        try {
            numberInput = Integer.parseInt(input);
        } catch (Exception e) {
            return false;
        }
        return numberInput < 3 && numberInput > 0;
    }

    public int runMenu() {
        Scanner scanner = new Scanner(System.in);
        String choice = null;
        while (validateInput(choice) == false) {
            menu();
            choice = scanner.nextLine();
        }
        return Integer.parseInt(choice);
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        String choice = null;
        while (validateInput(choice) == false) {
            menu();
            choice = scanner.nextLine();
        }
        System.out.printf("User selected %s", choice);
    }
}
