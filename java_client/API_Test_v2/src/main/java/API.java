import com.sun.jersey.api.client.Client;
import com.sun.jersey.api.client.WebResource;

public class API implements Runnable {
    private String url = "http://localhost/indic-wp/api/";
    private String[] inputs = null;
    private String method = null;
    private String expected = null;
    private String language = null;

    public void setLanguage(String language) {
        this.language = language;
    }

    public API(String method, String[] inputs, String expected) {
        this.expected = expected;
        this.method = method;
        this.inputs = inputs;
    }

    /**
     * This method creates a url to the web APIs
     * Upon instantiation of this class a string array is passed which should contain the parameters to turn into a UrL
     */
    public void create() {
        this.url += method + ".php?";
        if (method.equals("getUniqueIntersectingRank") && language.equals("english")) {
            url = "http://localhost/indic-wp/api/getUniqueIntersectingRank.php?string=hello&language=English&list[0]=e&list[1]=l&list[2]=i";
        } else if (method.equals("getUniqueIntersectingLogicalChars") && language.equals("english")) {
            url = "http://localhost/indic-wp/api/getUniqueIntersectingLogicalChars.php?string=hello!&language=English&list[0]=l&list[1]=l";
        } else {
            for (int i = 0; i < inputs.length; i++) {
                this.url += "input";
                this.url += String.valueOf(i + 1);
                this.url += "=";
                this.url += inputs[i];
                if (i < inputs.length - 1) {
                    this.url += "&";
                }
            }
        }
        url = url.replaceAll(" ", "%20");
    }

    /**
     * This is the call method. This method is what is ran by the thread pool.
     */
    public void call() {
        Client client = Client.create();
        WebResource resource = client.resource(this.url);
        String response = resource.get(String.class);
        response = response.replaceAll("\\p{C}", "");
        resultBuilder(response);
    }

    /**
     * This method takes the whole string response of the API. The string is then processed to get the data form the response.
     */
    public String getData(String response) {
        String data = null;
        try {
            data = (String) response.subSequence(response.lastIndexOf("\"data\":") + 7, response.length() - 1);
        } catch (Exception e) {
            System.out.println("Error caused by " + method);
        }
        return data;
    }

    /**
     * This method builds the results that are spit out to the CLI.
     */
    public void resultBuilder(String response) {
        String output = "Method: " + this.method + " | Address: " + this.url + " | ";
        for (int i = 0; i < inputs.length; i++) {
            output += "input ";
            output += String.valueOf(i + 1);
            output += " = ";
            output += inputs[i];
            output += " | ";
        }
        output += "Expected " + this.expected + " | Actual ";
        String data = getData(response);
        if (method.equals("randomize")) {
            output += data + " | P/F = " + ((data.toLowerCase()).equals(("[\"h\",\"e\",\"l\",\"l\",\"o\"]")) ? "Fail" : "Pass");
        } else {
            output += data + " | P/F = " + ((data.toLowerCase()).equals((expected.toLowerCase())) ? "Pass" : "Fail");
        }
        output += " | JSON response: " + response;
        System.out.println(output);
    }

    public void run() {
        create();
        call();
    }
}
